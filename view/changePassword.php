<?php
    if(isset($_SESSION['user']) && (count($_SESSION['user']) > 0)){
        extract($_SESSION['user']);
    }
?>
<div class="main-content">
        <div class="container-user">
            <div class="top">
                <a  href="index.html"><p>Trang Chủ</p></a> &#8260; <span class="cart-title">Tài Khoản</span> &#8260; <span class="cart-title">Thông tin tài khoản</span>&#8260; <span class="cart-title">Thay đổi mật khẩu</span>
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
                            <span>Thay đổi mật khẩu</span>
                        </div>
                        
                        <div class="box-content">
                            <form action="index.php?page=changepass" method="post" name="changepass_form" class="changepass_form">
                                <div class="type-changepass">
                                    <div>
                                        <label for="user-old-pass" class="input">Mật khẩu cũ</label>
                                        <input type="password"  name="user-old-pass" id="user-old-pass">
                                        <span class="form-message"></span>  
                                    </div>
                                </div>
                                <div class="type-changepass">
                                    <div>
                                        <label for="user-new-pass" class="input">Mật khẩu mới</label>
                                        <input type="password"  name="user-new-pass" id="user-new-pass">
                                    </div>
                                    <span class="form-message"></span>  
                                </div>
                                <div class="type-changepass">
                                    <div>
                                        <label for="user-re-new-pass" class="input">Nhập lại mật khẩu</label>
                                        <input type="password"  name="user-re-new-pass" id="user-re-new-pass">
                                    </div>
                                    <span class="form-message"></span> 
                                </div>
                                <input type="hidden" name="user-id" id="user_id" value="<?= $id ?>">
                                <input type="submit" name="btn-changepass" value="Thay đổi" class="submitupdate">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>