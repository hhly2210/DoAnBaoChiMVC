<?php

use helpers\Format;

include_once __DIR__ . '/../../lib/database.php';
include_once __DIR__ . '/../../helpers/format.php';

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

    public function insert_user($adminName, $Email, $adminUser, $adminPass, $roleID, $Active)
    {
        $adminName = $this->fm->validation($adminName);
        $Email = $this->fm->validation($Email);
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);
        $roleID = $this->fm->validation($roleID);
        $Active = $this->fm->validation($Active);
        // 
        $adminName = mysqli_real_escape_string($this->db->link, $adminName);
        $Email = mysqli_real_escape_string($this->db->link, $Email);
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
        $roleID = mysqli_real_escape_string($this->db->link, $roleID);
        $Active = mysqli_real_escape_string($this->db->link, $Active);
        //      Kiểm tra hình ảnh và upload vào folder avatar'
        $unique_image = '';
        list($hadFile, $file_temp, $unique_image, $uploaded_image) = $this->extracted();

        if (!empty($adminName) && !empty($adminUser) && !empty($adminPass) && !empty($roleID)) {
            if ($hadFile) move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_admin(adminName, Email, adminUser, adminPass, roleID, Active, Avatar) VALUES('$adminName', '$Email', '$adminUser', md5('$adminPass'), $roleID, $Active, '$unique_image')";
            $result = $this->db->insert($query);
        }
    }
    /**
     * @param string $unique_image
     * @return array
     */
    public function extracted(): array
    {
        $hadFile = !empty($_FILES['Avatar']) && $_FILES['Avatar']['size'] != 0 && str_starts_with($_FILES['Avatar']['type'], 'image/');
        if ($hadFile) {
            $file_name = $_FILES['Avatar']['name'];
            $file_temp = $_FILES['Avatar']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = __DIR__ . "/../resource/assets/img/avatars/" . $unique_image;
        }
        return array($hadFile, $file_temp, $unique_image, $uploaded_image);
    }
    public function show_user()
    {
        $query = "SELECT tbl_admin .*, tr . roleName FROM tbl_admin LEFT JOIN tbl_role tr on tbl_admin . roleID = tr . roleID ORDER BY adminID DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_user_one($id)
    {
        $query = "SELECT * FROM tbl_admin WHERE adminID = $id";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_user($id, $adminName, $Email, $adminUser, $adminPass, $roleID, $Active)
    {
        list($hadFile, $file_temp, $unique_image, $uploaded_image) = $this->extracted();

        $set = "adminName = '$adminName', Email = '$Email', adminUser = '$adminUser', roleID = $roleID, Active = $Active, Avatar = '$unique_image'";
        if (strlen($adminPass) != 0) {
            $set .= ", adminPass = md5('$adminPass')";
        }

        if ($hadFile) move_uploaded_file($file_temp, $uploaded_image);
        $query = "update tbl_admin set " . $set . " where adminID = $id";
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