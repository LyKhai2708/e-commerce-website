
<div class="modal m-hidden">
            <div class="modal__inner">
                <div class="modal_header">
                    <h3 class="modal_title">Thêm Danh Mục Mới</h3>
                    <div class="modal_close"><i class='bx bx-x'></i></div>
                </div>
                <hr>
                <div class="modal_body">
                    <form action="index.php?control=addcategory" method="POST" id="add-cat" accept-charset="UTF-8">
                        <div class="form-input-wrapper">
                            <label for="category_name">Tên Danh Mục</label>
                            <input type="text" name="category_name" id="category_name" required  placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-input-wrapper last">
                            <input type="submit" name="addcat" value="Thêm">
                        </div>
                    </form>
                </div>
                <div class="modal_footer">
                </div>
            </div>
        </div>