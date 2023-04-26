<?php
include '../lib/database.php';
include '../helpers/format.php';

?>

<?php
class category
{
    private $db;
    // format
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_category($catName, $catDescription)
    {
        $catName = $this->fm->validation($catName);
        $catDescription = $this->fm->validation($catDescription);

        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $catDescription = mysqli_real_escape_string($this->db->link, $catDescription);
        $idscript = "n" . strval(random_int(0, 99));
        $script = " <script>function tuTat(id) {let dom =document.getElementById(id);setTimeout(()=>{dom.remove();},3456);} tuTat('$idscript');</script>";
        if (empty($catName)) {
            $alert = "<div id='$idscript' class='alert alert-warning alert-dismissible'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>Tên thể loại không được để trống⛔</div>";
        } else {
            $query = "INSERT INTO tbl_category(catName, catDescription) VALUES('$catName', '$catDescription')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<div id='$idscript' class='alert alert-success alert-dismissible'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>Thêm thể loại thành công👍</div>";
            } else {
                $alert = "<div id='$idscript' class='alert alert-danger alert-dismissible'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>Thêm thể loại thất bại🙅</div>";
            }
        }
        return $alert . $script;
    }
    public function show_category()
    {
        $query = "SELECT * FROM tbl_category ORDER BY catID DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getcatbyID($id){
        $query = "SELECT * FROM tbl_category WHERE catID = '$id' ORDER BY catID DESC";
        $result = $this->db->select($query);
        return $result;
    }
}   

?>