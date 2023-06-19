<?php

use helpers\Format;

include_once __DIR__ . '/../../lib/database.php';
include_once __DIR__ . '/../../helpers/format.php';

class adminmenudata
{
    private $db;
    // format
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_admin_menu($adminMenuName, $ParentLevel, $MenuOrder, $Icon, $Link, $IsActive, $ClassName)
    {
        $adminMenuName = $this->fm->validation($adminMenuName);
        $ParentLevel = $this->fm->validation($ParentLevel);
        $MenuOrder = $this->fm->validation($MenuOrder);
        // $MenuTarget = $this->fm->validation($MenuTarget);
        $Icon = $this->fm->validation($Icon);
        $Link = $this->fm->validation($Link);
        // $IdName = $this->fm->validation($IdName);
        $IsActive = $this->fm->validation($IsActive);

        $adminMenuName = mysqli_real_escape_string($this->db->link, $adminMenuName);
        $ParentLevel = mysqli_real_escape_string($this->db->link, $ParentLevel);
        $MenuOrder = mysqli_real_escape_string($this->db->link, $MenuOrder);
        // $MenuTarget = mysqli_real_escape_string($this->db->link, $MenuTarget);
        $Icon = mysqli_real_escape_string($this->db->link, $Icon);
        $Link = mysqli_real_escape_string($this->db->link, $Link);
        // $IdName = mysqli_real_escape_string($this->db->link, $IdName);
        $IsActive = mysqli_real_escape_string($this->db->link, $IsActive);
        $ClassName = mysqli_real_escape_string($this->db->link, $ClassName);
        if (!empty($adminMenuName)) {
            $query = "INSERT INTO tbl_adminmenu(adminMenuName, ParentLevel, MenuOrder, Icon, Link, IsActive, ClassName) VALUES('$adminMenuName', $ParentLevel, $MenuOrder, '$Icon', '$Link', $IsActive, '$ClassName')";
            $result = $this->db->insert($query);
        }
    }

    public function show_admin_menu()
    {
        $query = "SELECT * FROM tbl_adminmenu ORDER BY adminMenuID DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_menu_by_role()
    {
        $id = Session::get('roleID');
        $query = "select * from tbl_adminmenu where adminMenuID in (select tbl_adminmenurole.adminMenuID from tbl_adminmenurole where roleID=$id) and IsActive = true order by ParentLevel asc, MenuOrder asc";
        $result = $this->db->select($query);
        $list = [];
        while ($record = $result->fetch_assoc()) {
            $list[] = array(
                'adminMenuName' => $record['adminMenuName'],
                'adminMenuID' => $record['adminMenuID'],
                'ParentLevel' => $record['ParentLevel'],
                'MenuOrder' => $record['MenuOrder'],
                'MenuTarget' => $record['MenuTarget'],
                'Icon' => $record['Icon'],
                'Link' => $record['Link'],
                'IdName' => $record['IdName'],
                'ClassName' => $record['ClassName'],
                'Childrens' => []
            );
        }

        for ($i = count($list) - 1; $i >= 0; $i--) {
            if ($list[$i]['ParentLevel'] != null) {
                $item = $list[$i];
                $cha = array_search($item['ParentLevel'], array_column($list, 'adminMenuID'));
                array_unshift($list[$cha]['Childrens'], $item);
//                $a = json_encode($cha);
//                echo "<script>console.log('$a')</script>";
            }
        }

        foreach ($list as $key => $item) {
            if ($item['ParentLevel'] != null) unset($list[$key]);
        }

        return $list;
    }

    public function show_admin_menu_one($id)
    {
        $query = "SELECT * FROM tbl_adminmenu WHERE adminMenuID = $id";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_admin_menu($id, $adminMenuName, $ParentLevel, $MenuOrder, $Icon, $Link, $IsActive, $ClassName)
    {
        $query = "update tbl_adminmenu set adminMenuName = '$adminMenuName', ParentLevel = '$ParentLevel', MenuOrder = '$MenuOrder', Icon = '$Icon', Link = '$Link', IsActive = '$IsActive', ClassName = '$ClassName' where adminMenuID = $id ";
        $result = $this->db->update($query);
        return $result;
    }

    public function delete_admin_menu($id)
    {
        $query = "delete from tbl_adminmenu where adminMenuID = $id";
        $result = $this->db->delete($query);
        return $result;
    }
}

?>