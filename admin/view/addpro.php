<?php $category = get_all_cat();
        $brand =getallbrand(); ?>
<div class="modal m-hidden">
            <div class="modal__inner product">
                <div class="modal_header">
                    <h3 class="modal_title">Thêm Sản Phẩm Mới</h3>
                    <div class="modal_close"><i class='bx bx-x'></i></div>
                </div>
                <hr>
                <div class="modal_body">
                    <form action="index.php?control=addproduct" method="POST" id="add-pro" accept-charset="UTF-8" enctype="multipart/form-data">
                        
                        <div class="form-input-wrapper">
                            <label for="product_name">Tên Sản Phẩm</label>
                            <input type="text" name="product_name" id="product_name" required  placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="form-input-wrapper">
                                <label for="category">Danh Mục</label>
                                <select name="category" id="category" class="form-input" required>
                                    <option value="0">Chọn Danh Mục</option>
                                    <?php foreach($category as $c){
                                        echo "<option value='".$c['id']."'>".$c['category_name']."</option>";
                                    }?>
                                </select>
                        </div>
                        <div class="form-input-wrapper">
                            <label for="cost_now">Giá Thực Tế</label>
                            <input type="number" name="cost_now" id="cost_now" required  placeholder="Nhập Giá" min="1">
                        </div>
                        <div class="form-input-wrapper">
                            <label for="cost_compare">Giá Giảm</label>
                            <input type="number" name="cost_compare" id="cost_compare" required  placeholder="Nhập Giá" min="1">
                        </div>
                        <div class="form-input-wrapper">
                            <label for="warranty">Bảo Hành</label>
                            <input type="number" name="warranty" id="warranty" required  placeholder="Nhập thời gian bảo hành/tháng">
                        </div>
                        <div class="form-input-wrapper">
                            <label for="brand">Thương hiệu</label>
                            <select name="brand" id="brand" class="form-input" required>
                                <option value="0">Chọn Thương Hiệu</option>
                                <?php foreach($brand as $b){
                                        echo "<option value='".$b['id']."'>".$b['brand_name']."</option>";
                                    }?> ?>
                            </select>
                        </div>
                        <div class="form-input-wrapper">
                            <label for="product-des">Miêu tả sản phẩm</label>
                            <textarea name="product_des" style="resize:none; height: 100px; font-size: 18px; font-weight: 500"></textarea>
                        </div>
                        <div class="form-input-wrapper">
                            <label for="product_avt">Ảnh sản phẩm</label>
                            <input type="file" name="product_avt" id="product_avt" required>
                        </div>
                        <div class="form-input-wrapper">
                            <label for="gallery[]">Ảnh Mô tả (chọn ít nhất 2 ảnh)</label>
                            <input type="file" name="gallery[]" id="gallery[]"  multiple>
                        </div>
                        <div class="form-input-wrapper">
                            <label for="stock">Số lượng kho</label>
                            <input type="number" name="stock" id="stock" required  placeholder="Nhập số lượng hàng nhập vào kho" min="1">
                        </div>
                        <div class="form-input-wrapper last">
                            <input type="submit" name="btn-add-pro" value="Thêm">
                        </div>
                    </form>
                </div>
                <div class="modal_footer">
                </div>
            </div>
        </div>