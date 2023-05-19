<?php

use helpers\Format;

include_once __DIR__ . '/../../lib/database.php';
include_once __DIR__ . '/../../helpers/format.php';

class post
{
    private $db;
    // format
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_post($Title, $Abstract, $Contents, $Images, $catID, $adminID)
    {
        $Title = $this->fm->validation($Title);
        $Abstract = $this->fm->validation($Abstract);
        $Contents = $this->fm->validation($Contents);
        $Images = $this->fm->validation($Images);
        $catID = $this->fm->validation($catID);
        $adminID = $this->fm->validation($adminID);

        $Title = mysqli_real_escape_string($this->db->link, $Title);
        $Abstract = mysqli_real_escape_string($this->db->link, $Abstract);
        $Contents = mysqli_real_escape_string($this->db->link, $Contents);
        $Images = mysqli_real_escape_string($this->db->link, $Images);
        $catID = mysqli_real_escape_string($this->db->link, $catID);
        $adminID = mysqli_real_escape_string($this->db->link, $adminID);
        if (!empty($Title) || !empty($Abstract) || !empty($Contents) || !empty($catID) || !empty($adminID)) {
            $query = "INSERT INTO tbl_post(Title, Abstract ,Contents, Images, catID, adminID) VALUES('$Title', '$Abstract', '$Contents', '$Images', $catID, $adminID)";
            $result = $this->db->insert($query);
        }
    }

    public function show_post()
    {
        $query = "SELECT tbl_post.*, tbad.adminName, cat.catName FROM tbl_post
    LEFT JOIN tbl_admin tbad on tbl_post.adminID = tbad.adminID
    LEFT JOIN tbl_category cat on tbl_post.catID = cat.catID
    WHERE tbl_post.IsActive = 1
    ORDER BY postID DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_user_post($id)
    {
        $query = "SELECT tbl_post.*, tbad.adminName, cat.catName FROM tbl_post
    LEFT JOIN tbl_admin tbad on tbl_post.adminID = tbad.adminID
    LEFT JOIN tbl_category cat on tbl_post.catID = cat.catID
    WHERE tbl_post.adminID = $id
    ORDER BY postID DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_waiting_post()
    {
        $query = "SELECT tbl_post.*, tbad.adminName, cat.catName FROM tbl_post
    LEFT JOIN tbl_admin tbad on tbl_post.adminID = tbad.adminID
    LEFT JOIN tbl_category cat on tbl_post.catID = cat.catID
    WHERE tbl_post.IsActive IS NULL
    ORDER BY postID DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_post_one($id)
    {
        $query = "SELECT * FROM tbl_post WHERE postID = $id";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_post($id, $Title, $Abstract, $Contents, $Images, $Link, $CreatedDate, $IsActive, $catID, $adminID)
    {
        $query = "update tbl_post set Title = '$Title', Abstract = '$Abstract', Contents = '$Contents', Images = '$Images', Link = '$Link', CreatedDate = '$CreatedDate', IsActive = '$IsActive', catID = '$catID', adminID = '$adminID' where postID = $id ";
        $result = $this->db->update($query);
        return $result;
    }

    public function delete_post($id)
    {
        $query = "delete from tbl_post where postID = $id";
        $result = $this->db->delete($query);
        return $result;
    }
}

?>