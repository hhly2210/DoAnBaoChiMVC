<?php

use helpers\Format;

include_once __DIR__ . '/../../lib/session.php';
include_once __DIR__ . '/../../lib/database.php';
include_once __DIR__ . '/../../helpers/format.php';
include_once __DIR__ . '/roleurl.php';

?>

<?php

class adminlogin
{
    private $db;
    // format
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function login_admin($adminUser, $adminPass)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        if (empty($adminUser) || empty($adminPass)) {
            $alert = "Tên người dùng và mật khẩu không được để trống";
            return $alert;
        } else {
            $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
            $result = $this->db->select($query);
            if ($result != false) {
                session_destroy();
                session_start();
                $value = $result->fetch_assoc();
                Session::set('adminlogin', true);
                Session::set('adminID', $value['adminID']);
                Session::set('adminUser', $value['adminUser']);
                Session::set('adminName', $value['adminName']);
                Session::set('roleID', $value['roleID']);
                Session::set('roleName', $this->admin_lay_ten_quyen($value['roleID']));
                Session::set('Avatar', $value['Avatar']);
                $urls = new roleurl();
                Session::set('urls', $urls->get_all_url_from_role($value['roleID']));
                header('Location:index.php');
            } else {
                $alert = "Tài khoản hoặc mật khẩu không đúng";
                return $alert;
            }
        }

    }

    private function admin_lay_ten_quyen($id)
    {
        $query = "SELECT tbl_role.roleName FROM tbl_role WHERE roleID = $id";
        $result = $this->db->select($query)->fetch_assoc();
        return $result['roleName'];
    }

}

?>