<?php

use helpers\Format;

include_once __DIR__ . '/../../lib/database.php';
include_once __DIR__ . '/../../helpers/format.php';

?>

<?php

class role
{
    private $db;
    // format
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function get_all()
    {
        $query = "SELECT * FROM tbl_role";
        $result = $this->db->select($query);
        return $result;
    }

}

?>