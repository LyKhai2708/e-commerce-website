<?php extract($_SESSION['user']); ?>
<div class="main-content">
        <div class="container-user">
            <div class="top">
                <a  href="index.html"><p>Trang Chủ</p></a> &#8260; <span class="cart-title">Tài Khoản</span> &#8260; <span class="cart-title">Thông tin đơn hàng</span>
            </div>
            <div class="container-user-main">
                <div class="hd left">
                    <div class="left-header">
                        <i class='bx bxs-user-circle'></i>
                        <span class="name-user"><?= $user_name ?></span>
                    </div>
                    <ul class="left-menu">
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
                    </ul>
                </div>
                <div class="right wrapper">
                    <div class="main user-address">
                        <div class="main-header">
                            <?php 
                             $os = "";
                             switch ($order['order_status']) {
                                case 0: 
                                    $os = "Đang xử lý";
                                    break;
                                case 1:
                                    $os = "Đã được duyệt";
                                    break;
                                case -1:
                                    $os = "Đã hủy";
                                    break;
                             } 
                             $pttt ="";
                             switch ($order['Pay_by']) {
                                case 1: 
                                    $pttt = "Thanh toán khi nhận hàng";
                                    break;
                                case 2: 
                                    $pttt = "Thanh toán bằng MoMo";
                                    break;
                                default:
                                    $pttt = "Thanh toán khi nhận hàng";
                                    break;
                            }
                             
                             ?>
                            <span>Đơn hàng của bạn /<?= $order['id'] ?></span>
                        </div>
                        <div class="box-content">
                            <div class="content-order">
                                <div class="user-info">
                                    <div class="title-user"><p><strong>Thông tin người nhận hàng</strong></p></div>
                                    <div class="user-name"><p><strong>Người nhận</strong> : <?= $order['cus_name'] ?></p></div>
                                    <div class="user-address"><p><strong>Địa chỉ</strong>: <?= $order['address'] ?></p></div>
                                    <div class="user-tel"><p><strong>Điện thoại</strong>: <?= $order['cus_phone'] ?></p></div>
                                    <div class="user-email"><p><strong>Email</strong>: <?= $order['cus_email'] ?></p></div>
                                </div>
                                <div class="order-info">
                                    <div class="order-title"><p><strong>Thông tin đơn hàng</strong></p></div>
                                    <div class="order-pt"><p><strong>Phương thức thanh toán</strong>: <?= $pttt ?></p></div>
                                    <div class="order-status"><p><strong>Trạng thái đơn hàng</strong>: <?= $os ?></p></div>
                                    <div class="order-date"><p><strong>Thời gian đặt hàng</strong>:<?= $order['order_date'] ?></p></div>
                                </div>
                                <?php foreach($product as $pd){
                                    $p = get_product_fromid($pd['proid']); ?>
                                <div class="order-product-info">
                                    <div class="product-title"><strong>Sản Phẩm</strong></div>
                                    <div class="product-box">
                                        <div class="product-left">
                                            <div class="product-img"><img src="upload/<?= $p['avt'] ?>" alt="" srcset=""></div>
                                            <div class="product-name"><p><?= $p['product_name'] ?></p></div>
                                        </div>
                                        <div class="product-right">
                                            <div class="product-cost"><?= format_money($pd['cost_now']) ?></div>
                                            <div class="product-quantity">Số lượng: <?= $pd['pd_quantity'] ?></div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <?php } ?>
                                <div class="order-cost">
                                    <div class="temp-cost"><p>Tổng tạm tính: <span><?= format_money($order['total_price']) ?></span></p></div>
                                    <div class="shipcost"><p>Phí vận chuyển: <span>Miễn Phí</span></p></div>
                                    <div class="finalcost"><p>Thành tiền: <span><?= format_money($order['total_price']) ?></span></p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>