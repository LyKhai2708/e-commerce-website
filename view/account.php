<?php
    if(isset($_SESSION['user']) && (count($_SESSION['user']) > 0)){
        extract($_SESSION['user']);
    }
?>
<div class="main-content">
        <div class="container-user">
            <div class="top">
                <a  href="index.html"><p>Trang Chủ</p></a> &#8260; <span class="cart-title">Tài Khoản</span> &#8260; <span class="cart-title">Thông tin tài khoản</span>
            </div>
            <div class="container-user-main">
                <div class="hd left">
                    <div class="left-header">
                        <i class='bx bxs-user-circle'></i>
                        <span class="name-user"><?= $user_name ?></span>
                    </div>
                    <ul class="left-menu">
                        <li class="menu-item">
                            <a href="index.php?page=account">Thông tin tài khoản</a>
                        </li>
                        <li class="menu-item">
                            <a href="index.php?page=orderlist">Thông tin đơn hàng</a>
                        </li>
                        <!-- <li class="menu-item">
                            <a href="javascript:void(0)">Danh sách địa chỉ</a>
                        </li> -->
                        <li class="menu-item">
                            <a href="index.php?page=logout">Đăng xuất</a>
                        </li>

                    </ul>
                </div>
                <div class="right wrapper">
                    <div class="main user-info">
                        <div class="main-header">
                            <span>Thông tin tài khoản</span>
                        </div>
                        <div class="set_password"><a href="index.php?page=password">Đặt lại mật khẩu</a></div>
                        <div class="box-content">
                            <form action="index.php?page=updatecus" method="post" name="update-form" class="update-form">
                                <div class="type">
                                    <label for="user-name" class="input">Họ và Tên</label>
                                    <input type="text" value="<?= $user_name ?>" name="user-name" id="user-name" required>
                                </div>
                                <div class="type">
                                    <label for="user-phone" class="input">Số điện thoại</label>
                                    <input type="tel" value="<?= $phone ?>" name="user-phone" id="user-phone" maxlength="11" required>
                                </div>
                                <div class="type">
                                    <label for="user-email" class="input">Email</label>
                                    <input type="email" value="<?= $email ?>" name="user-email" id="user-email" required>
                                </div>
                                <div class="type">
                                    <label for="user-pass" class="input">Mật khẩu</label>
                                    <input type="password" value="<?= $password ?>" name="user-pass" id="user-pass" readonly>
                                    
                                </div>
                                
                                <div class="type">
                                    <label for="user-birth" class="input">Ngày sinh</label>
                                    <input type="date" value="<?= $birth ?>" name="user-birth" id="user-birth" required>
                                </div>
                                <div class="radio-gender">
                                    <label for="user-gender" class="radio-title">Giới tính:</label>
                                    <div>
                                        <?php if($gender == "Nam") {?>
                                        <label for="Male">Nam</label>
                                        <input type="radio" name="user-gender" id="Male" value="Nam" checked>
                                        <label for="Female">Nữ</label>
                                        <input type="radio" name="user-gender" id="Female" value="Nữ">
                                        <?php }else{ ?>
                                        <label for="Male">Nam</label>
                                        <input type="radio" name="user-gender" id="Male" value="Nam">
                                        <label for="Female">Nữ</label>
                                        <input type="radio" name="user-gender" id="Female" value="Nữ" checked>
                                        <?php }?>
                                    </div>
                                </div>
                                <input type="hidden" name="user-id" id="user_id" value="<?= $id ?>">
                                <input type="submit" name="updateuser" value="Cập nhật" class="submitupdate">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>