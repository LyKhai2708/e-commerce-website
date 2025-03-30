<div class="modal m-hidden">
            <div class="modal__inner">
                <div class="modal_header">
                    <h3 class="modal_title">Thêm Thương Hiệu</h3>
                    <div class="modal_close"><i class='bx bx-x'></i></div>
                </div>
                <hr>
                <div class="modal_body">
                    <form action="index.php?control=addbrand" method="POST" id="add-cat" accept-charset="UTF-8">
                        <div class="form-input-wrapper">
                            <label for="brand_name">Tên Thương Hiệu</label>
                            <input type="text" name="brand_name" id="brand_name" required  placeholder="Nhập tên thương hiệu">
                        </div>
                        <div class="form-input-wrapper last">
                            <input type="submit" name="btn-addbrand" value="Thêm">
                        </div>
                    </form>
                </div>
                <div class="modal_footer">
                </div>
            </div>
        </div>