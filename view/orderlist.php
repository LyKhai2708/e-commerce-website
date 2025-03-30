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
                    <div class="main user-address">
                        <div class="main-header">
                            <span>Đơn hàng của bạn</span>
                        </div>
                        <div class="box-content">
                            <table style="width:100%" cellpadding="5" cellspacing="5">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày mua</th>
                                    <th>Số sản phẩm</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                </tr>
                                <?php 
                                    foreach($orders as $order){
                                    extract($order);
                                    $quantity = get_quantity_order_product($id);
                                    $os = "";
                                    switch ($order_status) {
                                        case 0: 
                                            $os = "Chờ duyệt";
                                            break;
                                        case 1:
                                            $os = "Đã được duyệt";
                                            break;
                                        default:
                                            $os = "Đã hủy";
                                            break;
                                    } ?>
                                <tr align="center" >
                                    <td style="font-size: 14px;"><a href="index.php?page=orderdetail&id=<?= $id ?>"><?= $id ?></a></td>
                                    <td style="font-size: 14px;"><?= $order_date ?></td>
                                    <td style="font-size: 14px;"><?= $quantity ?></td>
                                    <td style="font-size: 14px;"><?= format_money($total_price) ?></td>
                                    <td style="font-size: 14px;"><?= $os ?></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>