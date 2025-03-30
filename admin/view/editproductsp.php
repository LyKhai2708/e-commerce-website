<?php extract($specifies);?>
<div class="admin-content">
                <div class="content-header">
                    <span>Cập Nhật Thông Số Sản Phẩm</span>
                </div>
                <div class="content-main--category">
                <form action="index.php?control=update-tssp" method="POST" id="update-tssp" accept-charset="UTF-8" enctype="multipart/form-data">
                    <div class="update-form">
                        <div class="form-input-wrapper--update-form">
                            <label for="specifies_name">Tên Thông Số</label>
                            <input value="<?= $specifies_name  ?>" type="text" name="specifies_name" id="specifies_name" required>
                        </div>
                        <div class="form-input-wrapper--update-form">
                            <label for="value">Giá Trị</label>
                            <input value= "<?= $value  ?>" type="text" name="value" id="value" required >
                        </div>
                        <div class="form-input-wrapper--update-form">
                            <label for="product_name">Tên Sản Phẩm</label>
                            <select name="product_name" id="product_name" class="form-input" required>
                                <?php foreach($product as $p){
                                        if($proid == $p['id']){
                                            echo "<option value='".$p['id']."' selected>".$p['product_name']."</option>";
                                        }else{
                                        echo "<option value='".$p['id']."'>".$p['product_name']."</option>";
                                        }
                                    }?>  ?> 
                            </select>
                        </div>
                        <div class="form-submit--update-form last">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="submit" name="btn-update-tssp" value="Cập Nhập">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>