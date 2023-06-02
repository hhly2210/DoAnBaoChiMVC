<?php

use helpers\Format;

include_once __DIR__ . '/../../lib/database.php';
include_once __DIR__ . '/../../helpers/format.php';

class comment
{
    private $db;
    // format
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_comment($postID, $userName, $comment)
    {
        $postID = $this->fm->validation($postID);
        $userName = $this->fm->validation($userName);
        $comment = $this->fm->validation($comment);
        $postID = mysqli_real_escape_string($this->db->link, $postID);
        $userName = mysqli_real_escape_string($this->db->link, $userName);
        $comment = mysqli_real_escape_string($this->db->link, $comment);
        if (!empty($postID)) {
            $query = "INSERT INTO tbl_comment(postID, userName ,comment) VALUES('$postID', '$userName', '$comment')";
            $result = $this->db->insert($query);
        }
    }

    public function show_comment()
    {
        $query = "SELECT tbl_comment.* FROM tbl_comment
    ORDER BY commentID DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_comment_one($id)
    {
        $query = "SELECT * FROM tbl_comment WHERE commentID = $id";
        $result = $this->db->select($query);
        return $result;
    }
}
