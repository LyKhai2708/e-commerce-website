<div class="main-content">
            <div class="container-cart">
                <div class="cart-top top">
                    <a  href="index.php"><p>Trang Chủ</p></a> &#8260; <span class="cart-title">Giỏ Hàng</span>
                </div>
                <div class="cart-main">
                    <div class="cart-left">
                        <div class="cart-left-header">
                            <strong class="cart-header-title"> Sản Phẩm </strong> <span class="quantity-title"> Số lượng </span> <span class="cost-title">Thành tiền</span>
                        </div>
                        <hr>
                        <?php
                            $total=0;
                            $subtotal=0;
                            $cart = $_SESSION["cart"];
                            $pos = 0;
                            foreach($cart as $item){
                                $subtotal= $item['cost_now'] * $item['quantity'];
                                $total+=$subtotal;
                                $price_no = format_money($item['cost_now']);
                                if($item['cost_discount'] != null){
                                    $price_d = format_money($item['cost_discount']);
                                    $price_c = '<span class="product-discount-cost">
                                    <del>'.$price_d.'</del>
                                    </span>';
                                }else{
                                        $price_c = '';
                                } ?>
                        <div class="cart-product-info">
                            <div class="product-info-wrapper">
                                <div class="product-image">
                                    <a href="#"><img src="upload/<?=$item['product_avt']?>" alt="" srcset=""></a>
                                </div>
                                <div class="product-info">
                                    <p class="product-name"><?= $item['product_name'] ?></ơ>
                                    <div>
                                        <span class="product-cost-title">Giá:</span>
                                        <span class="product-cost">
                                            <span class="product-real-cost"><?= $price_no ?></span>
                                            <?=$price_c ?>
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="quantity-info">
                                <div class="quantity-control">
                                    <?php if($item['quantity'] == 1){?>
                                    <button title="button-minus" class="button-minus button" disabled><i class='bx bx-minus'></i></button>
                                    <div class="button-quantity">
                                        <input type="text" name="quantity" size="1" title="quantity" value="<?= $item['quantity'] ?>" min="1" readonly >
                                    </div>
                                    <a title="button-plus" class="button-plus button" href="index.php?page=pluscart&id=<?= $item['id'] ?>"  ><i class='bx bx-plus'></i></a>
                                    <?php }else {?>
                                    <a title="button-minus" class="button-minus button"href="index.php?page=minuscart&id=<?= $item['id'] ?>"><i class='bx bx-minus'></i></a>
                                    <div class="button-quantity">
                                        <input type="text" name="quantity" size="1" title="quantity" value="<?= $item['quantity'] ?>" min="1" readonly >
                                    </div>
                                    <a title="button-plus" class="button-plus button" href="index.php?page=pluscart&id=<?= $item['id'] ?>"  ><i class='bx bx-plus'></i></a>
                                    <?php } ?>
                                </div>
                                <div class="button-remove-product">
                                    <span class="remove-wrap">
                                        <a href="index.php?page=delcart&id=<?=$item['id']?>">Xóa</a>
                                    </span>
                                </div>
                            </div>
                            <div class="cost-info"><span><?=format_money($subtotal) ?></span></div>
                        </div>
                        <?php } if(empty($_SESSION['cart'])){?>
                        <div class="no-product">
                                <div class="no-product-img"><img src="image/noun-shopping-cart-sad-1700378.png" alt="" srcset=""></div><p>Giỏ Hàng Của Bạn Đang Trống</p>
                        </div>
                        <?php }?>
                    </div>
                    <div class="cart-right">
                        <div class="cart-right-header"><span>Thông tin đơn hàng</span></div>
                        <hr>
                        <div class="check-out-summary">
                            <div class="total-price-wrapper">
                                <p>
                                    Tổng tạm tính:
                                    <span class="total-price"><?=format_money($total) ?></span>
                                </p>
                            </div>
                            <!-- <div class="discount-input"><input type="text" placeholder="Nhập khuyến mãi (nếu có)"></div> -->
                            <div class="total-pay-wrapper">
                                <p>
                                    Thành tiền:
                                    <span class="total-pay"><?=format_money($total) ?></span>
                                </p>
                            </div>
                            <hr>
                            <div class="order-action">
                                <a title="checkout"class="btncart-checkout " href="index.php?page=checkout">THANH TOÁN</a>
                                <p class="continue">
                                    <a href="index.php">
                                        <i class='bx bx-undo'></i>
                                        Tiếp tục mua hàng
                                    </a>
                                </ơ>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>