<div class="admin-content">
                <div class="content-header">
                    <span>Đơn Hàng</span>
                </div>
                <div class="content-main--category">
                    <div class="main-header"> 
                        <div class="avenue"><p>Tổng doanh thu: <span> <?= format_money($sum)?></span></p></div>
                        <div class="sort-wrapper-order">
                                    <div class="sort-button" id="order-sort">
                                        <span class="sortlist_text">Lọc trạng thái đơn</span>
                                        <i class='bx bx-chevron-down'></i>
                                    </div>
                                    <ul id="order-sort-list">
                                        <li class="cat_item"><a href="index.php?control=orders">Tất cả</a></li>
                                        <?php if(!empty($_GET['date-from']) && !empty($_GET['to-date'])) {?>
                                        <li class="cat_item"><a href="index.php?control=orders&orderstatus=-1&date-from=<?= $_GET['date-from']?>&to-date=<?= $_GET['to-date']?>">Đã Hủy</a></li>
                                        <li class="cat_item"><a href="index.php?control=orders&orderstatus=0&date-from=<?= $_GET['date-from']?>&to-date=<?= $_GET['to-date']?>">Chưa Duyệt</a></li>
                                        <li class="cat_item"><a href="index.php?control=orders&paystatus=0&date-from=<?= $_GET['date-from']?>&to-date=<?= $_GET['to-date']?>">Chưa thanh toán</a></li>
                                        <li class="cat_item"><a href="index.php?control=orders&paystatus=2&date-from=<?= $_GET['date-from']?>&to-date=<?= $_GET['to-date']?>">Chưa Hoàn Tiền</a></li>
                                        <?php }else{ ?>
                                        <li class="cat_item"><a href="index.php?control=orders&orderstatus=-1">Đã Hủy</a></li>
                                        <li class="cat_item"><a href="index.php?control=orders&orderstatus=0">Chưa Duyệt</a></li>
                                        <li class="cat_item"><a href="index.php?control=orders&paystatus=0">Chưa thanh toán</a></li>
                                        <li class="cat_item"><a href="index.php?control=orders&paystatus=2">Chưa Hoàn Tiền</a></li>
                                        <?php } ?>
                                    </ul>
                        </div>
                        <div class="form-date-input">
                           
                            <fieldset>
                                <legend>Lọc</legend>
                                <form id="form-search-pro" method="GET">
                                <input type="hidden" name="control" value="orders">
                                <div class="from-date">Từ : <input type="date" name="date-from" id=""></div>
                                <div> - </div>
                                <div class="to-date"><input type="date" name="to-date" id=""></div>
                                <input type="submit">
                            </fieldset>
                        </div>
                    </div>
                        <table class="table" cellpadding="3" cellspacing="0">
                            <thead>
                                <th>Mã Đơn</th>
                                <th>Tên Khách Hàng</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>HTTT</th>
                                <th>Note</th>
                                <th>Thời gian đặt hàng</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Trạng thái thanh toán</th>
                                <th>Tổng tiền</th>
                                <th colspan="2">Hành động</th>
                            </thead>
                            <tbody>
                                <?php foreach ($order as $o ) {
                                    $pb = "";
                                    switch($o['Pay_by']){
                                    case 1:
                                        $pb = "COD";
                                    default:
                                        $pb ="COD";
                                    }
                                         ?>
                                    <tr>
                                        <td><?=$o['id']?></td>
                                        <td><?=$o['cus_name']?></td>
                                        <td><?=$o['address']?></td>
                                        <td><?=$o['cus_phone']?></td>
                                        <td><?=$o['cus_email']?></td>
                                        <td><?=$pb?></td>
                                        <td><?=$o['note']?></td>
                                        <td><?=$o['order_date']?></td>
                                        <?php if($o['order_status'] == 0) {?>
                                        <td><a class="btn-changestatus no btn-change-orderstatus" href="index.php?control=changeodstatus&id=<?=$o['id']?>&status=1">Chờ duyệt</a></td>
                                        <?php }else if($o['order_status'] == 1){ ?>
                                        <td><a class="btn-changestatus yes btn-change-orderstatus" href="index.php?control=changeodstatus&id=<?=$o['id']?>&status=0">Đã Duyệt</a></td>
                                        <?php }else if($o['order_status'] == -1){ ?>
                                        <td><a style="color:red; font-weight:700;" href="javascript:void(0)">Đã Hủy</a></td>
                                        <?php } ?>
                                        <?php if($o['pay_status'] == 0) {?>
                                        <td><a class="btn-changestatus no btn-change-paystatus" href="index.php?control=changepaystatus&id=<?=$o['id']?>&paystatus=1">Chưa thanh toán</a></td>
                                        <?php }else if($o['pay_status'] == 1){ ?>
                                        <td><a class="btn-changestatus yes btn-change-paystatus"href="index.php?control=changepaystatus&id=<?=$o['id']?>&paystatus=0">Đã thanh toán</a></td>
                                        <?php }else if($o['pay_status'] == 2){ ?>
                                            <td><a class="btn-changestatus no btn-change-paystatus"href="index.php?control=changepaystatus&id=<?=$o['id']?>&paystatus=3">Chờ hoàn tiền</a></td>
                                        <?php }else if($o['pay_status'] == 3){ ?>
                                            <td><a class="btn-changestatus yes btn-change-paystatus"href="index.php?control=changepaystatus&id=<?=$o['id']?>&paystatus=2">Đã hoàn tiền</a></td>
                                        <?php }else{ ?>
                                            <td><a style="color:red; font-weight:700;" href="javascript:void(0)">Đã hủy</a></td>
                                        <?php } ?>
                                        <td class="price"><?= format_money($o['total_price']) ?></td>
                                        <td> <a class='button-del' onclick="return sureOd()" href='index.php?control=cancelOD&id=<?=$o['id']?>&paystatus=<?=$o['pay_status']?>&orderstatus=<?=$o['order_status']?>'><i class='fa-solid fa-eraser'></i>Hủy</a></td>
                                        <td>
                                            <a class="button-view" onclick="Loadorder('<?=$o['id'] ?>')">Xem Đơn</a>
                                        </td>
                                    </tr>
                                <?php } ?>   
                        </tbody>
                    </table>
                    <script type="text/javascript" src="order.js?v=<?php echo time()?>"></script>
                </div>
            </div>
        </div>