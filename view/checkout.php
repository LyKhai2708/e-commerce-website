
<div class="main-content">
        <div class="container-checkout">
            <div class="top">
                <a  href="index.html"><p>Trang Chủ</p></a> &#8260; <a href="index.php?page=cart" class="cart-title">Giỏ Hàng</a> &#8260; <span class="cart-title">Thanh Toán</span>
            </div>
            <form action="index.php?page=order" method="post">
            <div class="container-checkout-main">
                <div class="left shipping-info">
                    <div class="shipping-info-wrapper">
                        <div class="shipping-info-title title"><span>THÔNG TIN ĐẶT HÀNG</span></div>
                        <?php if(!isset($_SESSION['user'])){ ?>
                        <div class="choose-log-in">Bạn đã có tài khoản? <a class="choose-login" href="javascript:void(0)">Đăng nhập</a></div>
                        <?php } ?>
                        <?php if(isset($_SESSION['user'])){
                            extract($_SESSION['user']);?>
                        <div class="username-input form-group required">
                            <label for="user-fullname">Họ và Tên</label>
                            <input value="<?= $user_name ?>" type="text" name="fullname" id="user-fullname" placeholder="Vui lòng nhập tên người nhận hàng" class="form-input" required>
                        </div>
                        <div class="phone-input form-group required">
                            <label for="user-phone">Số Điện Thoại</label>
                            <input value="<?= $phone ?>" type="tel" name="phone" id="user-phone" placeholder="Nhập số điện thoại" maxlength="11" class="form-input" required>
                        </div>
                        <div class="email-input form-group required">
                            <label for="user-email">Email</label>
                            <input value="<?= $email ?>" type="email" name="email" id="user-email" placeholder="Nhập email" class="form-input" required>
                        </div>
                        <?php }else {?>
                            <div class="username-input form-group required">
                            <label for="user-fullname">Họ và Tên</label>
                            <input value="" type="text" name="fullname" id="user-fullname" placeholder="Vui lòng nhập tên người nhận hàng" class="form-input" required>
                        </div>
                        <div class="phone-input form-group required">
                            <label for="user-phone">Số Điện Thoại</label>
                            <input value="" type="tel" name="phone" id="user-phone" maxlength="11" placeholder="Nhập số điện thoại" class="form-input" required>
                        </div>
                        <div class="email-input form-group required">
                            <label for="user-email">Email</label>
                            <input value="" type="email" name="email" id="user-email" placeholder="Nhập email" class="form-input" required>
                        </div>
                        <?php }?>
                        <div class="location-info-title"><span>Địa chỉ giao hàng</span></div>
                        <div class="location-info-wrapper">
                            <div class="form-group required">
                                <label for="user-city">Tỉnh/Thành Phố</label>
                                <select name="user-city" onchange="LoadDistrict(this.value)" id="user-city" class="form-input" required>
                                    <option  value="0">Chọn thành phố</option>
                                    <?php foreach($city as $i){ ?>
                                        <option value="<?= $i['province_id'] ?>"><?= $i['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="user-district">Quận/Huyện</label>
                                <select name="user-district" id="user-district" onchange="LoadWards(this.value)" class="form-input" required>
                                    <option value="">Chọn Quận/Huyện</option>
                                </select>
                            </div>
                            <div class="form-group required">
                                <label for="user-wards">Phường/Xã</label>
                                <select name="user-ward" id="user-wards" class="form-input" required>
                                    <option value="">Chọn Phường/Xã</option>
                                </select>
                            </div>
                            <div class="detail-location form-group required">
                                <label for="user-dt-add" >Địa chỉ cụ thể</label>
                                <input name="user-dt-address" type="text" name="" id="user-dt-add" placeholder="Nhập đường,số nhà,...." class="form-input" required>
                            </div>
                        </div>
                        <div class="shipping-info-title title"><span>THÔNG TIN BỔ SUNG</span></div>
                        <div class="order-note form-group">
                            <label for="user-order-note">Ghi chú: </label>
                            <textarea style="resize: none;" name="order-note" id="order-note" cols="50" placeholder="Ghi chú chi tiết cho đơn hàng..."></textarea>
                        </div>
                    </div>
                    
                    <div class="pay-type">
                        <span class="pay-type-title">Phương thức thanh toán: </span>
                        <label for="pay-type">Thanh toán khi nhận hàng</label>
                        <input type="radio" id="pay-type" name="pay-type" value="1" checked>
                    </div>
                </div>
                
                
                <div class="order-detail right">
                    <div class="order-info-title title"><span>Thông tin đơn hàng</span></div>
                    <div class="order-info-wrapper">
                    <?php   $total=0;
                            $subtotal=0;
                            $cart = $_SESSION["cart"];
                            $pos = 0;
                            if(isset($_SESSION['cart'])){
                            $cart = $_SESSION['cart'];
                            foreach($cart as $item) {
                                $subtotal= $item['cost_now'] * $item['quantity'];
                                $total+=$subtotal;
                                $price_no = format_money($item['cost_now']);
                                if($item['cost_discount'] != null){
                                    $price_d = format_money($item['cost_discount']);
                                    $price_c = '<div class="discount-cost"><del>'.$price_d.'</del></div>';
                                }else{
                                        $price_c = '';
                                }?>
                        <div class="product-info">
                            <div class="product-img">
                                <img src="upload/<?=$item['product_avt'] ?>" alt="" srcset="">
                            </div>
                            
                            <div class="product-dt">
                                <div class="pro-name"><?=$item['product_name'] ?></div>
                                <div class="pro-quantity"><span>Số lượng: </span><span><?=$item['quantity'] ?></span></div>
                                <div class="pro-cost">
                                    <div class="cost-now"><?=$price_no ?></div>
                                    <?=$price_c ?>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="checkout-submit">
                        <div class="temp-cost">
                            <div>Tổng tạm tính</div>
                            <div><?=format_money($total) ?></div>
                            
                        </div>
                        <div class="shipping-fee">
                            <div>Phí vận chuyển</div>
                            <div>Miễn Phí</div>
                        </div>
                        <hr>
                        <div class="final-cost">
                            <div>Thành tiền</div>
                            <div><?=format_money($total) ?></div>
                            <input type="hidden" name="total-cost-order" value="<?=  $total ?>">
                        </div>
                        <?php }?>
                        <div class="submit-button">
                            <input type="submit" value="Đặt hàng" name="order">
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>