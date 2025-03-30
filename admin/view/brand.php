<?php
    $html_brand="";
    foreach($brand as $br){
        $n = get_product_brand($br['id']);
        $html_brand .= "<tr>
        <td>".$br['id']."</td>
        <td>".$br['brand_name']."</td>
        <td>$n</td>
        <td>
            <a class='button-del' href='index.php?control=delbrand&id=".$br['id']."'><i class='fa-solid fa-eraser'></i> Xóa</a>
        </td>
    </tr>";
    }
?>
<div class="admin-content">
                <div class="content-header">
                    <span>Thương Hiệu Sản Phẩm</span>
                </div>
                
                <div class="content-main--category">
                        <button class="btn-add">Thêm Thương Hiệu</button>
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Tên Thương Hiệu</th>
                                <th>Số sản phẩm</th>
                                <th>Hành động</th>
                            </thead>
                            <tbody>
                                <?= $html_brand ?>
                            </tbody>
                        </table>

                </div>
            </div>
        </div>