<?php
function veDeQuy($menus)
{
    $echo = '';
    foreach ($menus as $item) {
        $menuToggle = '';

        if (count($item["Childrens"]) != 0) $menuToggle = 'menu-toggle';

        $echo .= "<li class='menu-item'>
            <a href='" . $item['Link'] . "' class='" . $item['ClassName'] . " " . $menuToggle . "'>
                <i class='" . $item['Icon'] . "'></i>
                <div>" . $item['adminMenuName'] . "</div>
            </a>";

        if (count($item["Childrens"]) != 0) {
            $echo .= "<ul class='menu-sub'>";
            $echo .= veDeQuy($item["Childrens"]);
            $echo .= "</ul>";
        }

        $echo .= "</li>";
    }
    return $echo;
}