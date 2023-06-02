<?php
include_once __DIR__ . "/../../admin/context/category.php";
$result = $cat->get_category_for_menu();
$datacategory = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $datacategory[] = $row;
    }
}
function has_child($datacategory, $catID)
{
    foreach ($datacategory as $key) {
        if ($key['parentID'] == $catID) {
            return true;
        }
    }
    return false;
}


/**
 * render_menu
 * dùng để render menu theo $datacategory
 *
 * @param  mixed $datacategory
 * @param  int $parentID id của menu
 * @return void
 */
function render_menu($datacategory, $parentID = 0)
{

    $result = '';
    foreach ($datacategory as $v) {
        if ($v['parentID'] == $parentID) {
            $result .= "<li class='nav-item dropdown'>";
            $result .= "<a class='nav-link dropdown-toggle' href='catagory.php?catID={$v['catID']}' id='navbarDropdown' role='button' aria-haspopup='true' aria-expanded='false'>{$v['catName']}</a>";
            if (has_child($datacategory, $v['catID'])) {
                $result .= '<ul class="dropdown-menu" aria-labelledby="navbarDropdown mt-0">';
                $result .= render_child($datacategory, $v['catID']);
                $result .= '</ul>';
            }
            $result .= "</li>";
        }
    }
    return $result;
}

function render_child($datacategory, $parentID) {
    $result = '';
    foreach ($datacategory as $v) {
        if ($v['parentID'] == $parentID) {
            $result .= "<a class='dropdown-item' href='catagory.php?catID={$v['catID']}'>{$v['catName']}</a>";
        }
    }
    return $result;
}

echo render_menu($datacategory);
?>