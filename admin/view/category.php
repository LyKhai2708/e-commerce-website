<?php 
    $html_cat ="";
    $parent_name = "";
    $menu = "";
    foreach($category as $c){
        if($c['home']==1){
            $home = "<a href='index.php?control=changeStatuscat&id=".$c["id"]."&home=0'class='changeStatuscat-btn yes'>Có</a>";
        }else {
            $home = "<a href='index.php?control=changeStatuscat&id=".$c["id"]."&home=1'class='changeStatuscat-btn no'>Không</a>";
        }
        $html_cat .= "<tr>
        <td>".$c["id"]."</td>
        <td>".$c["category_name"]."</td>
        <td>".$home."</td>
        <td>
            <a class='button-del' href='index.php?control=delcat&id=".$c["id"]."'><i class='fa-solid fa-eraser'></i> Xóa</a>
        </td>
    </tr>";
    }
?>
<div class="admin-content">
                <div class="content-header">
                    <span>Danh Mục</span>
                </div>

                <div class="content-main--category">
                        <button class="btn-add">Thêm Danh Mục</button>  
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Tên Danh Mục</th>
                                <th>Đưa lên Trang Chủ</th>
                                <th>Hành Động</th>
                            </thead>
                            <tbody>
                                <?= $html_cat?>
                            </tbody>
                        </table>

                </div>
            </div>
        </div>