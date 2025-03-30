<?php
$product_relate = get_product_relate($cat_name[0]['id'],$id);
$_html_relate = " ";
if($product_relate == null){
    $_html_relate = "Đang cập nhật";
}
foreach($product_relate as $p){
    $price_no = format_money($p['price_now']);
    if($p['price_discount'] != null){
        $price_d = format_money($p['price_discount']);
        $price_c = '<span class="CostBeforeSale"><del>'.$price_d.'<sup>₫</sup></del></span>';
    }else{
            $price_c = '';
    }
    $_html_relate .= '<div class="product-card">
    <a href="index.php?page=product&pid='.$p['id'].'">
        <div class="product-image">
            <img src="upload/'.$p['avt'].'" alt="">
        </div>
    </a>
    <div class="product-detail">
        <a href=""><span class="product-name">'.$p['product_name'].'</span></a>
        <div class="cost">
            '.$price_c.'
            <span class="RealCost">'.$price_no.'<sup>₫</sup></span> 
        </div>
    </div>
    </div>';     
}
extract($product);
$price_n = format_money($price_now);
    if($price_discount != null){
        $price_d = format_money($price_discount);
        $price_com = '<div class="cost-compare-wrapper">
                        <span class="cost-compare"><del>'.$price_d.'</del></span>
                      </div>';
        }else{
            $price_com = '';
}
?>

<div class="main-content">
        <div class="1-product-container">
            <div class="product-detail-top top">
                <a  href="index.php"><p>Trang Chủ</p></a> <?php foreach($cat_name as $cat) {?>&#8260; <span class="collection-title"><?= $cat['category_name'] ?></span> <?php }?> &#8260; <span class="collection-title"><?= $product_name ?></span>
            </div>
            <div class="product-detail-main">
                <div class="columm-left1 left">
                    <div class="gallery-product">
                        <?php if($gallery == null) {?>
                        <div class="product-img">
                            <img src="upload/<?=$avt ?>" alt="" srcset="">
                        </div>
                        <?php }else { ?>
                        <div class="img-slider-show">
                            <div class="slider-main">
                                <img class="img-feature" src= <?= "upload/".$gallery[0]['img_path'] ?>>
                                <div class="control prev m-hidden"><i class='bx bx-chevron-left'></i></div>
                                <div class="control next m-hidden"><i class='bx bx-chevron-right'></i></div>
                            </div>
                            <div class="img-gallery-list">
                                <?php foreach($gallery as $pic){ ?>
                                <div class="img-pro"><img src= "<?= "upload/".$pic['img_path'] ?>" alt=""></div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="right-inf-control">
                        <div class="pro-content">
                            <div class="pro-name"><h2><?=$product_name ?></h2></div>
                            <div class="pro-info">
                                <div class="pro-brand">
                                    <span class="pro-brand-title title">Thương hiệu:</span>
                                    <a href="" class="pro-brand-value"><?php echo $brand ?></a>
                                </div>
                                <div class="pro-type">
                                    <?php $cat = get_cat_from_pid($id);?>
                                        <span class="pro-type-title title">Loại/Danh Mục:</span>
                                        <a href= <?= "index.php?page=collection&cat_id=".$cat[0]['id'] ?> class="pro-type-value"><?= $cat['0']['category_name']?></a>
                                </div>
                                <div class="warrranty">
                                    <span class="warrranty-title title">Bảo hành</span>
                                    <span class="warrranty-value"><?= $warranty ?> tháng</span>
                                </div>
                                <div class="status">
                                    <span class="statuc-title title">Tình trạng</span>
                                    <span class="status-value">Còn hàng: <?= $stock ?> sản phẩm</span>
                                </div>
                            </div>
                            <div class="pro-cost">
                                <div class="cost-now-wrapper">
                                    <span class="cost-now"><?php echo $price_n ?></span>
                                </div>
                                
                                <?php echo $price_com ?>
                                <!-- <div class="cost-compare-wrapper">
                                    <span class="cost-compare"><del>29,999,999</del></span>
                                </div> -->
                            </div>
                        </div>
                        <form action="index.php?page=addtoCart" method="post">
                        <div class="wrapp-addcart">
                                <input type="hidden"  name="product_id" value="<?= $id ?>">
                                <input type="hidden"  name="product_img"value="<?= $avt ?>">
                                <input type="hidden"  name="product_name" value="<?= $product_name ?>">
                                <input type="hidden"  name="cost_now" value="<?= $price_now ?>">
                                <input type="hidden"  name="cost_discount" value="<?= $price_discount ?>">
                            <div class="button-left">
                                <input type="submit" value="Thêm vào giỏ hàng" name="button-addcart">
                            </div>
                            <div class="button-right">
                                <input type="submit" value="Mua Ngay" name="button-buynow">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="columm-right1 right">
                    <div class="sale-policy">
                        <div class="policy-title title">
                            <span>Chính sách bán hàng</span>
                        </div>
                        <div class="policy-content">
                            <ul>
                                <li class="content"><i class='bx bxs-package'></i> <span>Giao hàng miễn phí toàn quốc</span></li>
                                <li class="content"><i class='bx bxs-offer'></i> <span>Cam kết hàng chính hãng</span></li>
                                <li class="content"><i class='bx bx-receipt'></i> <span>Đổi trả trong vòng 7 ngày nếu có lỗi từ NSX</span></li>
                            </ul> 
                        </div>
                    </div>
                </div>
                <div class="columm-left2 left">
                    <div class="pro-des">
                        <div class="des-title"><h3>Mô tả sản phẩm</h3></div>
                        <div class="des-content">
                            <p>
                                <?php echo $product_des?>
                            </p>
                        </div>
                    </div>
                    
                </div>
                <div class="columm-right2 right">
                    <div class="pro-parameter">
                        <div class="parameter-title"><h3>Thông số kỹ thuật</h3></div>
                        <div class="parameter-content">
                            <?php 
                            $html = "";
                            if($specifies){
                                $html = '<table style="width:100%" cellpadding="10" cellspacing="0">
                                <tbody>';
                                foreach($specifies as $sp){
                                    $html .= "<tr>
                                    <td>".$sp['specifies_name']."</td>
                                    <td>".$sp['value']."</td>
                                    </tr>";
                                }
                                $html .= "</tbody>
                                </table>";
                            }else{
                                $html = "Đang cập nhật....";
                            }
                            echo $html?>
                            
                            <!-- <table style="width:100%" cellpadding="10" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>CPU</td>
                                        <td>i5 11400H</td>
                                    </tr>
                                    <tr>
                                        <td>RAM</td>
                                        <td>8GB</td>
                                    </tr>
                                    <tr>
                                        <td>RAM</td>
                                        <td>8GB</td>
                                    </tr>
                                    <tr>
                                        <td>RAM</td>
                                        <td>8GB</td>
                                    </tr>
                                    <tr>
                                        <td>RAM</td>
                                        <td>8GB</td>
                                    </tr>
                                    <tr>
                                        <td>RAM</td>
                                        <td>8GB</td>
                                    </tr>
                                    <tr>
                                        <td>RAM</td>
                                        <td>8GB</td>
                                    </tr>
                                    <tr>
                                        <td>RAM</td>
                                        <td>8GB</td>
                                    </tr>
                                </tbody>
                            </table> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment-container">
                <div class="comment-title"></div>
                <div class=""></div>
            </div>
            <div class="relative-product-wrapper">
                <div class="relative-product">
                    <div class="product-list-name"><strong>Sản phẩm liên quan</strong></div>
                    <div class="product-list">
                        <?= $_html_relate ?>
                    </div>
                </div>
            </div>   
        </div>
        <div class="button-scroll-back"><i class='bx bxs-up-arrow'></i></div>
    </div>
    <script type="text/javascript" src="javascript/product-1.js?=<?php echo time();?>"></script>