<?php
//dang nhap
if(isset($_POST['dangnhap'])&& $_POST['dangnhap']){
    $cusmail = $_POST['cus-email'];
    $cuspass = $_POST['cus-pass'];
    $user = getuser($cusmail,$cuspass);
    
    if($user!= null && $user['roleid'] == 1){
        $_SESSION['user']= $user;
        echo '<script type="text/javascript">window.location.href="admin/index.php"</script>'; 
    }else if($user!= null && $user['roleid'] == 2){
        $_SESSION['user']= $user;
        if(!empty($_SESSION['cart'])){ //kiểm tra trong session có giỏ hàng không  
            $cart = $_SESSION['cart'];
            if(check_cart($user['id']) > 0){ // nếu có tiếp tục kiểm tra user có giỏ hàng không, có thì xóa
                detele_product_cart($user['id']);
            }
            foreach($cart as $item){
                addcart($user['id'],$item['id'],$item['quantity']);//thêm giỏ hàng từ session vô cho user
            }
        }else{//nếu không có giỏ hàng
            if(check_cart($user['id']) > 0){ // user có giỏ hàng trong db
                foreach(check_cart($user['id']) as $i){// thêm giỏ hàng của user vào session
                    $pd = get_product_fromid($i['productid']);
                    $id = $pd['id'];
                    $product_img = $pd['avt'];
                    $product_name = $pd['product_name'];
                    $cost_now = $pd['price_now'];
                    $cost_discount = $pd['price_discount'];
                    $quantity = $i['quantity'];
                    $pro = array('id'=> $id,'product_avt'=>$product_img,'product_name'=>$product_name,'cost_now'=>$cost_now,'cost_discount'=> $cost_discount,'quantity'=>$quantity);
                    array_push($_SESSION['cart'],$pro);
                }
            }//nếu không thì thôi 
        }
        echo '<script type="text/javascript">window.history.back();</script>';
        $_SESSION['status-success']="Đăng nhập thành công";
        // echo '<script type="text/javascript">window.location.href="index.php"</script>';
    }else{
        echo '<script type="text/javascript">window.history.back();</script>';
        $_SESSION['status-false']= "Thông tin đăng nhập không hợp lệ";
    }
}

//dang ky
if(isset($_POST['dangki'])&& $_POST['dangki']){
    $cusname = $_POST['cus-name'];
    $cusmail = $_POST['cus-email'];
    $cuspass = $_POST['cus-pass'];
    $cusphone = $_POST['cus-phone'];
    $user = checkemail($cusmail);
    if($user){
        echo '<script type="text/javascript">window.history.back();</script>';
        $_SESSION['status-false']="Email này đã tồn tại";
    }else{
        $adduser=adduser($cusname,$cusmail,$cuspass,$cusphone);
        if($adduser){
            echo '<script type="text/javascript">window.history.back();</script>';
            $_SESSION['status-success']="Tạo tài khoản thành công hãy đăng nhập";
        }else{
            echo '<script type="text/javascript">window.history.back();</script>';
            $_SESSION['status-false']="Có lỗi trong việc thêm tài khoản!";
        }
    }
}
?>
<footer>
            <div class="logo-footer"><img src="image/logot.png" alt="" srcset=""></div>
            <p>©2024 Lý Phương Khải B2111930
                <br><i class="fa-solid fa-location-dot"></i> 115/8e Phường An Thới, Quận Bình Thủy, Thành Phố Cần Thơ
                <br><i class='bx bxs-envelope'></i> khaiB2111930@student.ctu.edu.vn
            </p>
            <div class="social-footer">
                <div class="facebook-footer"><a href="https://www.facebook.com/B1ue.04/"><i class='bx bxl-facebook-circle'></i></a></div>
                <div class="instagram-footer"><a href="https://www.instagram.com/khiisme/"><i class='bx bxl-instagram'></i></a></div>
            </div>
        </footer>
        <div class="modal-register m-hidden">
            <div class="modal__inner">
                <div class="modal_header">
                    <h3 class="modal_title"></h3>
                    <div class="modal_close"><i class='bx bx-x'></i></div>
                </div>
                <hr>
                <div class="modal_body">
                    <div class="form-wrap">
                        <div class="register-form m-hidden">
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="create-cus" name="create-cus" accept-charset="UTF-8">
                                <input type="hidden" name="form-type" value="create-cus">
                                <div class="form-input-wrapper">
                                    <label for="register-cus-name">Họ và tên</label>
                                    <input type="text" name="cus-name" id="register-cus-name"  placeholder="Nguyen Van A">
                                    <span class="form-message"></span>
                                </div>
                                <div class="form-input-wrapper">
                                    <label for="register-cus-email">Email</label>
                                    <input type="email" name="cus-email" id="register-cus-email"   placeholder="abc@gmail.com">
                                    <span class="form-message"></span>
                                </div>
                                <div class="form-input-wrapper">
                                    <label for="register-cus-phone">Số điện thoại</label>
                                    <input type="tel" name="cus-phone" id="register-cus-phone"  pattern="(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})" placeholder="0867587681" minlength="10" maxlength="11">
                                    <span class="form-message"></span>
                                </div>
                                <div class="form-input-wrapper">
                                <label for="register-cus-pass">Mật khẩu</label>
                                    <input type="password" name="cus-pass" id="register-cus-pass"  placeholder="a-zA-Z0-9">
                                    <span class="form-message"></span>
                                </div>
                                <div class="form-input-wrapper">
                                <label for="register-cus-re-pass">Nhập lại mật khẩu</label>
                                    <input type="password" name="cus-re-pass" id="register-cus-re-pass"  placeholder="a-zA-Z0-9">
                                    <span class="form-message"></span>
                                </div>
                                <div class="form-input-wrapper last">
                                    <input type="submit"  name="dangki" value="Tạo tài khoản">
                                </div>
                            </form>
                        </div>
                        <div class="login-form m-hidden">
                            <form action= <?php echo $_SERVER['PHP_SELF'] ?> method="POST" id="cus-login" accept-charset="UTF-8">
                                <div class="form-input-wrapper">
                                    <label for="login-cus-email">Email</label>
                                    <input type="email" name="cus-email" id="login-cus-email" required  placeholder="abc@gmail.com">
                                </div>
                                <div class="form-input-wrapper">
                                    <label for="login-cus-pass">Mật Khẩu</label>
                                    <input type="password" name="cus-pass" id="login-cus-pass" required placeholder="Nhập mật khẩu">
                                </div>
                                <!-- <div class="text-right">
                                    <a href="javascript:void(0)">Quên mật khẩu</a>
                                </div> -->
                                <div class="form-input-wrapper last">
                                    <input type="submit"  name="dangnhap" value="Đăng nhập">
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
                <div class="modal_footer">
                    <div class="form-chng-btn login-footer m-hidden">
                        <span>Bạn chưa có tài khoản?<a href="javascript:void(0)" class="register-trigger">Đăng ký ngay</a></span>
                    </div>
                    <div class="form-chng-btn register-footer m-hidden">
                        <span>Bạn đã có tài khoản?<a href="javascript:void(0)" class="login-trigger">Đăng nhập</a></span>
                    </div>
                </div>
            </div>
        </div>
</body>
<script type="text/javascript" src="javascript/login-res.js?=<?php echo time();?>"></script>
<script type="text/javascript" src="javascript/slider.js?=<?php echo time();?>"></script>
<script type="text/javascript" src="javascript/category.js?=<?php echo time();?>"></script>
<script type="text/javascript" src="javascript/collection.js?=<?php echo time();?>"></script>
<script type="text/javascript" src="javascript/cart.js?=<?php echo time();?>"></script>
<script type="text/javascript" src="javascript/scroll.js?=<?php echo time();?>"></script>
<script type="text/javascript" src="javascript/validate.js?=<?php echo time();?>"></script>
<script type="text/javascript" src="location.js?=<?php echo time();?>"></script>
<!-- <script>
    Validator({
        form: "#create-cus",
        rules:[
            Validator.isrequired('#register-cus-name'),
            Validator.isrequired('#register-cus-email'),
            Validator.isEmail('#register-cus-email'),
            Validator.isrequired('#register-cus-phone'),
            Validator.checkLength('#register-cus-pass'),
            Validator.ConfirmPass('#register-cus-re-pass',function () {
                return document.querySelector("#create-cus #register-cus-pass").value
            })
        ]
    });
</script> -->
</html>