<?php

use helpers\Format;

include_once __DIR__ . '/../../lib/database.php';
include_once __DIR__ . '/../../helpers/format.php';

class roleurl
{
    private $db;
    // format
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function get_all_url_from_role($roleID)
    {
        $sql = "SELECT * FROM tbl_roleurl where roleID = $roleID";
        $query = $this->db->select($sql);
        $arrayUrl = [];
        //nếu sql select ra 0 bản ghi thì việc gọi fetch_assoc sẽ tạo ra lỗi
        if ($query->num_rows > 0)
            while ($result = $query->fetch_assoc()) {
                $arrayUrl[] = $result['url'];
            }
        return $arrayUrl;
    }

}

?>