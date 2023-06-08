<?php

use helpers\Format;

include_once __DIR__ . '/../../lib/database.php';
include_once __DIR__ . '/../../helpers/format.php';

class contact
{
    private $db;
    // format
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_contact($fullName, $email, $message)
    {
        $fullName = $this->fm->validation($fullName);
        $email = $this->fm->validation($email);
        $message = $this->fm->validation($message);

        $fullName = mysqli_real_escape_string($this->db->link, $fullName);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $message = mysqli_real_escape_string($this->db->link, $message);
        if (!empty($fullName) && !empty($message)) {
            $query = "INSERT INTO tbl_contact(fullName, email ,message) VALUES('$fullName', ' $email', '$message')";
            $result = $this->db->insert($query);
        }
    }

    public function show_contact()
    {
        $query = "SELECT * FROM tbl_contact
    ORDER BY contactID DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_contact_one($id)
    {
        $query = "SELECT * FROM tbl_contact WHERE contactID = $id";
        $result = $this->db->select($query);
        return $result;
    }
    public function delete_contact($id)
    {
        $query = "delete from tbl_contact where contactID = $id";
        $result = $this->db->delete($query);
        return $result;
    }
}
