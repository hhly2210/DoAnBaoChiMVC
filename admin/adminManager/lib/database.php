<?php

namespace Dev;

/**
 * @template T
 */
class MySqlDatabase
{
    public string $server;
    public string $username;
    public string $password;
    public string $dataname;
    public string $tablename;
    /** @var array<string> */
    public array $key;
    /** @var array<string> */
    public array $columns;

    /**
     * __construct
     *
     * @param  string $server
     * @param  string $username
     * @param  string $password
     * @param  string $database
     * @param  string $tablename
     * @param  array<string> $key
     * @param  array<string> $columns
     * @return void
     */
    public function __construct($server, $username, $password, $database, $tablename, $key, $columns)
    {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->dataname = $database;
        $this->tablename = $tablename;
        $this->key = $key;
        $this->columns = $columns;
    }


    private function createConnection(): \mysqli
    {
        return new \mysqli($this->server, $this->username, $this->password, $this->dataname);
    }


    /**
     * select
     * @return array<T>|null
     */
    public function select(?int $n, ?int $limit)
    {
        $connection = $this->createConnection();
        $columns = implode(',', array_merge(array_keys($this->key), array_keys($this->columns)));
        $sql = "SELECT {$columns} FROM `{$this->tablename}`";
        if (isset($n)) {
            $sql = $sql . " OFFSET {$n}";
        }
        if (isset($limit)) {
            $sql = $sql . " LIMIT {$limit}";
        }
        $result = [];
        /** @var array<string> */
        $columns = array_merge(array_keys($this->key), array_keys($this->columns));
        try {
            $reader =  $connection->query($sql);
            if ($reader->num_rows == 0) return false;
            while ($data = $reader->fetch_assoc()) {
                $obj = new \stdClass();
                foreach ($columns as $key) {
                    $obj->$key = $data[$key];
                }
                $result[] = $obj;
            }
            return $result;
        } finally {
            $connection->close();
        }
    }
    
    /**
     * selectOneById
     *
     * @param  array $key
     * @return T|bool
     */
    public function selectOneById($key)
    {
        $connection = $this->createConnection();
        $columns = implode(',', array_merge(array_keys($this->key), array_keys($this->columns)));

        $where = [];
        foreach (array_keys($this->key) as $k)
            $where[] = "{$k} = ?";
        $where = implode(" AND ", $where);

        $sql = "SELECT {$columns} FROM `{$this->tablename}` WHERE {$where}";

        $prepared = $connection->prepare($sql);
        $types = implode(array_values($this->key));
        $prepared->bind_param($types, ...$key);


        /** @var array<string> */
        $columns = array_merge(array_keys($this->key), array_keys($this->columns));
        try {

            if (!$prepared->execute()) return false;
            $reader = $prepared->get_result();
            if($reader->num_rows == 0) return false;
            $data = $reader->fetch_assoc();
            $obj = new \stdClass();
            foreach ($columns as $key) $obj->$key = $data[$key];
        } finally {
            $connection->close();
        }
    }

    /**
     * selectRaw
     * @param string $selector
     * @param string $after
     * @return array|array<array>|bool
     */
    public function selectRaw($selector, $after = '')
    {
        $connection = $this->createConnection();
        $sql = "SELECT {$selector} FROM `{$this->tablename} {$after}`";
        try {
            $reader = $connection->query($sql);
            if ($reader->num_rows == 0) return false;
            if ($reader->num_rows == 1) return $reader->fetch_assoc();
            $arr = [];
            while ($arr[] = $reader->fetch_assoc());
            return $arr;
        } catch (\Exception $e) {
            return false;
        } finally {
            $connection->close();
        }
    }


    /**
     * insert
     * @param  T $object
     * @return bool
     */
    public function insert($object, bool $hasKey = false)
    {
        $connection = $this->createConnection();
        $columns = array_keys($this->columns);
        $n = count($this->columns);
        if ($hasKey) {
            $n += count($this->key);
            $columns = array_merge(array_keys($this->key), $columns);
        }
        $columns = implode(',', $columns);
        $values_template = substr(str_repeat("?,", $n), 0, -1);
        $types = implode(array_values($this->columns));
        $prepared = $connection->prepare("INSERT INTO `{$this->tablename}` ({$columns}) VALUES ({$values_template});");
        $values = [];
        /** @var array<string> */
        $columns = array_keys($this->columns);
        if ($hasKey) {
            $columns = array_merge(array_keys($this->key), $columns);
            $types = implode(array_values($this->key)) . $types;
        }
        foreach ($columns as $key) {
            $values []= $object->$key;
        }
        $prepared->bind_param($types, ...$values);
        try {
            return $prepared->execute();
        } finally {
            $connection->close();
        }
    }

    /**
     * insert
     * @param  T $object
     * @return bool
     */
    public function update($object)
    {
        $connection = $this->createConnection();
        $columns = array_keys($this->columns);


        $set_template = [];
        foreach ($columns as $c)  $set_template[] = "{$c}=?";
        $set_template = implode(', ', $set_template);

        $where_template = [];
        foreach (array_keys($this->key) as $k)
            $where_template[] = "{$k}=?";
        $where_template = implode(" AND ", $where_template);

        $types = implode(array_values($this->columns));
        $prepared = $connection->prepare("UPDATE `{$this->tablename}` SET {set_template} WHERE {$where_template}");

        $types = implode(array_merge(array_values($this->columns), array_values($this->key)));
        $data = [];
        foreach ($columns as $c) $data[] = $object->$c;
        foreach (array_keys($this->key) as $key)  $data[] = $object->$key;
        $prepared->bind_param($types, ...$data);

        try {
            return $prepared->execute();
        } finally {
            $connection->close();
        }
    }

    /**
     * @param array<string> $key
     */
    public function delete($key)
    {
        $connection = $this->createConnection();
        $where = [];
        foreach (array_keys($this->key) as $k)
            $where[] = "{$k} = ?";
        $where = implode(" AND ", $where);
        try {
            $sql = "DELETE FROM `{$this->tablename}` WHERE {$where} ;";
            $prepared = $connection->prepare($sql);
            $types = implode(array_values($this->key));
            $prepared->bind_param($types, ...$key);
            return   $prepared->execute();
        } finally {
            $connection->close();
        }
    }
    
    /**
     * deleteRaw
     *
     * @param  array $value
     * @param  string $format
     * @return bool
     */
    public function deleteRaw($value, $format)
    {
        $connection = $this->createConnection();
        $where = [];
        foreach (array_keys($value) as $k)
            $where[] = "{$k} = ?";
        $where = implode(" AND ", $where);
        try {
            $sql = "DELETE FROM `{$this->tablename}` WHERE {$where} ;";
            $prepared = $connection->prepare($sql);
            $values = array_values($value);
            $prepared->bind_param($format, ...$values);
            return $prepared->execute();
        } finally {
            $connection->close();
        }
    }
}
