

<div class="admin-content">
                <div class="content-header">
                    <span>Cập Nhật Sản Phẩm</span>
                </div>
                <?php
                    $category = get_all_cat();
                    $brand = getallbrand();
                    extract($product);
                        if($avt != ""){
                            $img = "../upload/".$avt;
                            $image = '<img src="'.$img.'" alt="">';
                        }else{
                            $image= "Chưa có ảnh";
                        }
                ?>
                <div class="content-main--category">
                    <form action="index.php?control=updateproduct" method="POST" id="update-pro" accept-charset="UTF-8" enctype="multipart/form-data">
                    <div class="update-form">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="form-input-wrapper--update-form">
                            <label for="product_name">Tên Sản Phẩm</label>
                            <input value="<?= $product_name ?>" type="text" name="product_name" id="product_name" required >
                        </div>
                        <div class="form-input-wrapper--update-form">
                            <label for="category">Danh Mục</label>
                            <select name="category" id="category" class="form-input" required>
                                <option value="0">Chọn Danh Mục</option>
                                <?php foreach($category as $c){
                                    if($categoryid == $c['id']){
                                        echo "<option value='".$c['id']."' selected>".$c['category_name']."</option>";
                                    }else{
                                        echo "<option value='".$c['id']."'>".$c['category_name']."</option>";
                                    }
                                    }?>
                            </select>
                        </div>
                        <div class="form-input-wrapper--update-form">
                            <label for="cost_now">Giá Thực Tế</label>
                            <input type="number" value="<?= $price_now ?>" name="cost_now" id="cost_now" required   min="1">
                        </div>
                        <div class="form-input-wrapper--update-form">
                            <label for="cost_compare">Giá Giảm</label>
                            <input type="number" value="<?= $price_discount ?>" name="cost_compare" id="cost_compare"  placeholder="Nhập Giá" min="1">
                        </div>
                        <div class="form-input-wrapper--update-form">
                            <label for="warranty">Bảo Hành</label>
                            <input type="number" value="<?= $warranty ?>" name="warranty" id="warranty" required >
                        </div>
                        
                        <div class="form-input-wrapper--update-form">
                            <label for="brand">Thương hiệu</label>
                            <select name="brand" id="brand" class="form-input" required>
                                <option value="0">Chọn Thương Hiệu</option>
                                <?php foreach($brand as $b){
                                        if($brandid == $b['id']){
                                            echo "<option value='".$b['id']."' selected>".$b['brand_name']."</option>";
                                        }else{
                                        echo "<option value='".$b['id']."'>".$b['brand_name']."</option>";
                                        }
                                    }?> 
                            </select>
                        </div>
                        <div class="form-input-wrapper--update-form">
                            <label for="product_des">Miêu tả sản phẩm</label>
                            <textarea name="product_des" id="product_des" style="resize:none; height: 200px; font-size: 18px; font-weight: 500"><?= $product_des ?></textarea>
                        </div>
                        <div class="form-input-wrapper--update-form">
                            <label for="stock">Số lượng kho</label>
                            <input  type="number" value="<?= $stock ?>" name="stock" id="stock" required  min="1">
                        </div>
                        <div class="current-image" name="cur-img">Ảnh Đại Diện: <div class="img"><?= $image ?></div></div>
                        <input type="hidden" name="cur-img" value="<?= $avt ?>">
                        <div class="form-input-wrapper--update-form">
                            <label for="product_avt">Chọn Ảnh Khác</label>
                            <input type="file" name="product_avt" id="product_avt" >
                        </div>
                        <div class="form-input-wrapper--update-form">
                        <span>Ảnh mô tả sản phẩm</span>
                        <div class="list_gallery">
                        
                            <?php if($gallery == null){
                                echo "Chưa có ảnh";
                            }else{ foreach($gallery as $g) {?>
                            <div class="image_wrapper"><img src="../upload/<?= $g['img_path'] ?>" alt="" srcset=""></div>
                            <?php }} ?>
                        </div>
                        </div>
                        <div class="form-input-wrapper--update-form">
                            <label for="gallery[]">Chọn Các Ảnh Khác</label>
                            <input type="file" name="gallery[]" id="gallery[]" multiple>
                        </div>
                        <div class="form-submit--update-form last">
                            <input type="submit" name="btn-update-pro" value="Cập Nhập">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>