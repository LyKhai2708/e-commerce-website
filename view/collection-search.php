
<?php
        $html_col = '';
        foreach ($collection_search as $item){
            extract($item);
            $price_n = format_money($price_now);
            if($price_discount != null){
                $price_d = format_money($price_discount);
                $price_com = '<span class="CostBeforeSale"><del>'.$price_d.'</del></span>';
            }else
            {
                $price_com = '';
            }
            $html_col .= '
            <div class="product-card">
                <form action="index.php?page=addtoCart" method="post">
                    <input type="hidden"  name="product_id" value="'.$id.'">
                    <input type="hidden"  name="product_img"value="'.$avt.'">
                    <input type="hidden"  name="product_name" value="'.$product_name.'">
                    <input type="hidden"  name="cost_now" value="'.$price_now.'">
                    <input type="hidden"  name="cost_discount" value="'.$price_discount.'">
                    <a href="index.php?page=product&pid='.$id.'">
                        <div class="product-image">
                            <img src="upload/'.$avt.'" alt="">
                        </div>
                    </a>
                    <div class="product-detail">
                        <a href="index.php?page=product&pid='.$id.'"><span class="product-name">'.$product_name.'</span></a>
                        <div class="cost">
                            '.$price_com.'
                            <span class="RealCost">'.$price_n.'</span> 
                        </div>
                        <div class="btn-add">
                            <input class="addtocart" type="submit" name="button-addcart" value="Thêm vào giỏ hàng">
                        </div>
                    </div>
                </form>
            </div>';
        }
        ?>
        
        
        <div class="main-content">
            <section class="collection-product-wrapper">
                <div class="collection-top top">
                        <a  href="index.php"><p>Trang Chủ</p></a> &#8260; <span class="collection-title">Kết quả tìm kiếm</span>
                </div>
                <div class="collection-main">
                    <div class="container-collection-wrapper">
                        <div class="container-collection">
                            <div class="collection-product-name"><strong>Kết quả tìm kiếm</strong></div>
                            <div class="collection-sort">
                                <div class="sort-wrapper">
                                    <div class="sort-button"><i class='bx bx-sort-down'></i>
                                        <span class="sortlist_text">Xếp theo: </span>
                                        <span class="sortlist_value current_sort"><?php echo $orderby ?></span>
                                    </div>
                                    <div class="list_sort_wrapper sortby-option sortBy">
                                        <ul class="list_sort">
                                            <li class="list_sort_item" data-value="manual"><?php echo "<a href='index.php?page=search&kw=".$kw."&orderby=manual'>" ?><span>Nổi bật</span></a></li>
                                            <li class="list_sort_item" data-value="price-acending"><?php echo "<a href='index.php?page=search&kw=".$kw."&orderby=cost_asc'>" ?><span>Giá Tăng Dần</span></a></li>
                                            <li class="list_sort_item" data-value="price-descending"><?php echo "<a href='index.php?page=search&kw=".$kw."&orderby=cost_des'>" ?><span>Giá Giảm Dần</span></a></li>
                                            <li class="list_sort_item" data-value="title-acending"><?php echo "<a href='index.php?page=search&kw=".$kw."&orderby=name_asc'>" ?><span>A - Z</span></a></li>
                                            <li class="list_sort_item" data-value="title-descending"><?php echo "<a href='index.php?page=search&kw=".$kw."&orderby=name_des'>" ?> <span>Z - A</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="collection-product">
                                <?=$html_col?> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="button-scroll-back"><i class='bx bxs-up-arrow'></i></div>
        <!-- footer -->