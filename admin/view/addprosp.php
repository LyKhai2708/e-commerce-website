<?php $product = get_All_product() ?>
<div class="modal m-hidden">
            <div class="modal__inner">
                <div class="modal_header">
                    <h3 class="modal_title">Thêm Thông Số Sản Phẩm</h3>
                    <div class="modal_close"><i class='bx bx-x'></i></div>
                </div>
                <hr>
                <div class="modal_body">
                    <form action="index.php?control=addpdsp" method="POST" id="add-cat" accept-charset="UTF-8">
                        <div class="form-input-wrapper">
                            <label for="specifies_name">Tên Thông Số</label>
                            <input type="text" name="specifies_name" id="specifies_name" required  placeholder="Nhập tên thông số">
                        </div>
                        <div class="form-input-wrapper">
                            <label for="sp_value">Giá Trị</label>
                            <input type="text" name="sp_value" id="sp_value" required  placeholder="Giá trị thông số">
                        </div>
                        <div class="form-input-wrapper">
                            <label for="product_name">Sản Phẩm</label>
                            <select name="product_name" id="product_name" class="form-input" required>
                                <?php foreach($product as $pro) {?>
                                    <option value="<?= $pro['id'] ?> "><?= $pro['product_name'] ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-input-wrapper last">
                            <input type="submit" name="btn_addpdsp" value="Thêm">
                        </div>
                    </form>
                </div>
                <div class="modal_footer">
                </div>
            </div>
        </div>
    </div>