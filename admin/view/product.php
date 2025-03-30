<?php $html_product="";
    foreach($product as $pr) {
        //lay danh muc
        $cat = get_cat_from_pid($pr['id']);
        if($pr['brandid'] == null){
            $brand = "Không";
        }else {
            $brand = getBrandname($pr['brandid']);
        }
        $acat = "";
        if($cat == null){
        $acat = "Không";
        }else{
        foreach($cat as $c){
            $acat .= $c['category_name']."\n";
        }
        }
        //sua tien
        if($pr['price_discount'] == null){
            $pdis = "Không";
        }else {
            $pdis = format_money($pr['price_discount']);
        }
        //lay status
        if($pr['product_status'] == 1){
            $status = '<td><a class="button-togglehid show" href="index.php?control=changeprostatus&id='.$pr['id'].'&status=0">Hiện</a></td>';
        }else {
            $status = '<td><a class="button-togglehid hidden" href="index.php?control=changeprostatus&id='.$pr['id'].'&status=1">Ẩn</a></td>';
            
        }
        //load anh 
        if($pr['avt']!=""){
            $image = "../upload/".$pr['avt'];
        }else {
            $image = "";
        }
        $html_product .= '<tr>
        <td>'.$pr['id'].'</td>
        <td>'.$pr['product_name'].'</td>
        <td><img src="'.$image.'" alt=""></td>
        <td class="truncanted">'.$pr['product_des'].'</td>
        <td>'.format_money($pr['price_now']).'</td>
        <td>'.$pdis.'</td>
        <td>'.$pr['warranty'].' tháng</td>
        <td><pre>'.$acat.'</pre></td>
        <td>'.$brand.'</td>
        <td>'.$pr['stock'].'</td>
        '.$status.'
        <td><a class="button-del" href="index.php?control=prodel&id='.$pr['id'].'" onclick="return Sure()"><i class="fa-solid fa-eraser"></i> Xóa</a></td>
        <td>
            <a class="button-edit" href="index.php?control=editProduct&id='.$pr['id'].'"><i class="fa-regular fa-pen-to-square"></i> Sửa</a>
        </td>
    </tr>';
    }?>
<div class="admin-content">
                <div class="content-header">
                    <span>Sản Phẩm</span>
                </div>

                <div class="content-main--category">
                        <button class="btn-add">Thêm Sản Phẩm Mới</button>
                        <div class="control_product">
                            <div>
                                <div class="sort-wrapper">
                                    <div class="sort-button" id="category_sort">
                                        <span class="sortlist_text">Tìm theo danh mục</span>
                                        <i class='bx bx-chevron-down'></i>
                                    </div>
                                    <ul id="category_sort_list">
                                        <li class="cat_item"><a href="index.php?control=product">Tất cả</a></li>
                                        <?php foreach($category as $c){
                                                if(isset($_GET['kw']) && $_GET['kw'] != ""){
                                                    echo "<li class='cat_item'><a href='index.php?control=product&catid=".$c['id']."&kw=".$kw."'>".$c['category_name']."</a></li>";
                                                }else{
                                                echo "<li class='cat_item'><a href='index.php?control=product&catid=".$c['id']."'>".$c['category_name']."</a></li>";
                                                }
                                        }?>
                                    </ul>
                                </div>
                                <div class="product_search">
                                    <form id="form-search-pro" method="GET" action="">
                                    <fieldset>
                                        <legend>Tìm kiếm</legend>
                                        <label>Tên:</label>
                                        <input type="hidden" name="control" value="product">
                                        <input type="text" name="kw" id="" placeholder="Nhập tên sản phẩm">
                                        <input type="submit" value="Tìm">
                                    </fieldset>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table  class="table" cellpadding="3" cellspacing="0">
                            <thead>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Avatar</th>
                                <th>Miêu tả</th>
                                <th>Giá thực tế</th>
                                <th>Giá giảm</th>
                                <th>Bảo hành</th>
                                <th>Danh mục</th>
                                <th>Thương hiệu</th>
                                <th>Stock</th>
                                <th>Trạng thái</th>
                                <th colspan="2">Hành động</th>
                            </thead>
                            <tbody id="table_product">
                                <?= $html_product?>
                                
                            </tbody>
                    </table>
                        <div class="pagination">
                            <?php
                            echo paginate(NUMBER_RECORD,$cur_page,$cat_now,$kw);
                            ?>
                        </div>
                </div>
            </div>
        </div>