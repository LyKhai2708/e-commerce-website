<?php
include 'C:\xampp\htdocs\NLCS\DAO\connectdb.php';
include 'C:\xampp\htdocs\NLCS\DAO\category.php';
$html_cat='';
$category = get_all_cat();
function has_child($data,$parentid){
    foreach($data as $cat){
        extract($cat);
    if($parent_id == $parentid){
        return true;
        }
    }
    return false;
}

function render_cat($data, $parentid = 0, $level = 0) {
    if ($level == 0)
      $result = '<ul class="dropdown-content">';
    else
      $result = '<ul class="submenu-2">';

  
    foreach ($data as $m) {
        
      if ($m['parent_id'] == $parentid) {
        $result .= '<li class="sub-item">';
        $result .= '<a href="#" class="cat">';
        $result .= '<div class="catcontent-wrapper">';
        $result .= '<div class="name-sub">' . $m['category_name'] . '</div>';
        $result .= '</div>';
        if (has_child($data, $m['id'])) {
          $result .= render_cat($data, $m['id'], $level + 1);
          echo $result;
        }
        $result .= '</li>';
      }
    }
  
    $result .= '</ul>';
  
    return $result;
  }
  echo(render_cat($category));
?>