<?php  $html_sp = ""; 
    foreach ($pd_sp as $sp) {
        $product = get_product_fromid($sp['proid']);
        $html_sp .= '<tr>
        <td>'.$sp['id'].'</td>
        <td>'.$sp['specifies_name'].'</td>
        <td>'.$sp['value'].'</td>
        <td>'.$product['product_name'].'</td>
        <td>
            <a class="button-del" href="index.php?control=delproductsp&id='.$sp['id'].'"><i class="fa-solid fa-eraser"></i> Xóa</a>
        </td>
        <td>
            <a class="button-edit" href="index.php?control=editproductsp&id='.$sp['id'].'"><i class="fa-regular fa-pen-to-square"></i> Sửa</a>
        </td>
    </tr>';

    }?>
<div class="admin-content">
                <div class="content-header">
                    <span>Thông Số Sản Phẩm</span>
                </div>
                
                <div class="content-main--category">
                        <div class="main-header">
                            <button class="btn-add">Thêm Thông Số Sản Phẩm Mới</button>
                            <div class="control_product">
                                <div>
                                    <div class="product_search">
                                        <form id="form-search-pro" method="GET" action="">
                                        <fieldset>
                                            <legend>Tìm kiếm</legend>
                                            <label>Tên:</label>
                                            <input type="hidden" name="control" value="productsp">
                                            <input type="text" name="kw" id="" placeholder="Nhập tên sản phẩm">
                                            <input type="submit" value="Tìm">
                                        </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Tên Thông Số</th>
                                <th>Giá Trị</th>
                                <th>Tên Sản Phẩm</th>
                                <th colspan="2">Thao tác</th>
                            </thead>
                            <tbody>
                                <?= $html_sp ?>
                            </tbody>
                        </table>
                        
                </div>
            </div>
        </div>