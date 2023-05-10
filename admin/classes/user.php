<?php

use helpers\Format;

include __DIR__ . '/../../lib/database.php';
include __DIR__ . '/../../helpers/format.php';

?>

<?php

class user
{
    private $db;
    // format
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_user($adminName, $Email, $adminUser, $adminPass, $roleID, $Active, $Avatar)
    {
        $adminName = $this->fm->validation($adminName);
        $Email = $this->fm->validation($Email);
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);
        $roleID = $this->fm->validation($roleID);
        $Active = $this->fm->validation($Active);
        $Avatar = $this->fm->validation($Avatar);
        // 
        $adminName = mysqli_real_escape_string($this->db->link, $adminName);
        $Email = mysqli_real_escape_string($this->db->link, $Email);
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
        $roleID = mysqli_real_escape_string($this->db->link, $roleID);
        $Active = mysqli_real_escape_string($this->db->link, $Active);
        $Avatar = mysqli_real_escape_string($this->db->link, $Avatar);
        if (!empty($adminName)) {
            $query = "INSERT INTO tbl_admin(adminName, Email, adminUser, adminPass, roleID, Active, Avatar) VALUES('$adminName', '$Email', '$adminUser', '$adminPass', $roleID, $Active, '$Avatar')";
            $result = $this->db->insert($query);
        }
    }

    public function show_user()
    {
        $query = "SELECT * FROM tbl_admin ORDER BY adminID DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_user_one($id)
    {
        $query = "SELECT * FROM tbl_admin WHERE adminID = $id";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_user($id, $adminName, $Email, $adminPass, $roleID, $Active, $Avatar)
    {
        $query = "update tbl_admin set adminName = '$adminName', Email = '$Email', adminPass = '$adminPass', roleID = $roleID, Active = $Active, Avatar = '$Avatar' where adminID = $id ";
        $result = $this->db->update($query);
        return $result;
    }
    public function delete_user($id)
    {
        $query = "delete from tbl_admin where adminID = $id";
        $result = $this->db->delete($query);
        return $result;
    }
}

?>