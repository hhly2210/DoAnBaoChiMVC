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

    public function verify_status($id)
    {
        $query = "update tbl_post set IsActive = 1 where postID = $id ";
        $result = $this->db->update($query);
        return $result;
    }

    // random
    public function get_post_by_random($limit)
    {
        $sql = "SELECT postID FROM tbl_post";
        $result = $this->db->select($sql);
        // Tạo một mảng chứa các postID
        $postIDs = array();
        if ($result->num_rows > 0) {
            // Duyệt qua các bản ghi và thêm postID vào mảng
            while ($row = $result->fetch_assoc()) {
                array_push($postIDs, $row["postID"]);
            }
        }
        // Sắp xếp các postID trong mảng theo thứ tự ngẫu nhiên
        shuffle($postIDs);
        // Lấy 5 phần tử đầu tiên của mảng (hoặc số lượng bài viết bạn muốn hiển thị)
        $postIDs = array_slice($postIDs, 0, $limit);
        // Chuyển đổi danh sách postID trong mảng thành một chuỗi để sử dụng trong câu lệnh SQL WHERE
        $postIDString = implode(",", $postIDs);
        $sql = "SELECT tbl_post.*, tbl_category.catName, ad.adminName FROM tbl_post
        INNER JOIN tbl_category ON tbl_category.catID = tbl_post.catID
        INNER JOIN tbl_admin ad ON ad.adminID = tbl_post.adminID
         WHERE IsActive = 1 AND postID IN ($postIDString) ORDER BY RAND()";
        $result = $this->db->select($sql);
        return $result;
    }

    // mới nhất
    public function get_post_by_new($limit)
    {
        $query = "SELECT tbl_post.*, tbl_category.catName, ad.adminName FROM tbl_post
        INNER JOIN tbl_category ON tbl_category.catID = tbl_post.catID
        INNER JOIN tbl_admin ad ON ad.adminID = tbl_post.adminID
         WHERE IsActive = 1 ORDER BY CreatedDate DESC LIMIT $limit";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_post_by_category($id, $limit)
    {
        $query = "SELECT tbl_post.*, tbl_category.catName, ad.adminName FROM tbl_post 
        INNER JOIN tbl_admin ad ON ad.adminID = tbl_post.adminID 
        INNER JOIN tbl_category ON tbl_category.catID = tbl_post.catID
        WHERE tbl_post.catID = $id AND IsActive = 1 ORDER BY CreatedDate DESC LIMIT $limit";
        $result = $this->db->select($query);
        return $result;
    }
    // lấy post để phân trang
    public function get_all_post_by_category($id)
    {
        $query = "SELECT * FROM tbl_post
        WHERE tbl_post.catID = $id AND IsActive = 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_all_post_by_category_paging($id, $limit)
    {
        // $limit = 7;
        if (!isset($_GET['trang']))
            $trang = 1;
        else
            $trang = $_GET['trang'];
        $offSet = ($trang - 1) * $limit;
        $query = "SELECT tbl_post.*, tbl_category.catName, ad.adminName FROM tbl_post 
        INNER JOIN tbl_admin ad ON ad.adminID = tbl_post.adminID 
        INNER JOIN tbl_category ON tbl_category.catID = tbl_post.catID
        WHERE tbl_post.catID = $id AND IsActive = 1 ORDER BY CreatedDate DESC LIMIT $offSet, $limit";
        $result = $this->db->select($query);
        return $result;
    }

    // show post by cat
    public function show_post_one_by_cat($id)
    {
        $query = "SELECT tbl_post.*, tbl_category.catName, ad.adminName
         FROM tbl_post
        INNER JOIN tbl_admin ad ON ad.adminID = tbl_post.adminID 
        INNER JOIN tbl_category ON tbl_category.catID = tbl_post.catID
         WHERE postID = $id";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_post($id, $Title, $Abstract, $Contents, $Images, $catID)
    {
        $query = "update tbl_post set Title = '$Title', Abstract = '$Abstract', Contents = '$Contents', Images = '$Images', catID = '$catID' where postID = $id ";
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
