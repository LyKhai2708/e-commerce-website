
        <?php
        $html_col = '';
        foreach ($collection_k as $item){
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
                        <a  href="index.php"><p>Trang Chủ</p></a> &#8260; <span class="collection-title"><?php echo $title ?></span>
                </div>
                <div class="collection-main">
                    <!-- <div class="collection-filter">
                        <div class="filter-total"></div>
                        <div class="filter-single">
                            <div class="list-filter-single">
                                <div data-param="hang" class="filter-group hang">
                                    <div class="filter-wrapper">
                                        <div class="filter-title">
                                            <span>Hãng</span>
                                            <span><i class='bx bx-chevron-down'></i></span>
                                        </div>
                                        <div class="filter-content filter-hang">
                                            <ul>
                                                <li data-filter="acer">
                                                    <label for="data-hang-1">
                                                        <input type="checkbox" id="data-hang-1" value="acer">
                                                        Acer
                                                    </label>
                                                </li>
                                                <li data-filter="asus">
                                                    <label for="data-hang-2">
                                                        <input type="checkbox" id="data-hang-2" value="asus">
                                                        ASUS
                                                    </label>
                                                    
                                                </li>
                                                <li data-filter="lenovo">
                                                    <label for="data-hang-3">
                                                        <input type="checkbox" id="data-hang-3" value="lenovo">
                                                        Lenovo
                                                    </label>
                                                    
                                                </li>
                                                <li data-filter="MSI">
                                                    <label for="data-hang-4">
                                                        <input type="checkbox" id="data-hang-4" value="MSI">
                                                        MSI
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div data-param="cpu" class="filter-group filter-cpu">
                                    <div class="filter-wrapper">
                                        <div class="filter-title">
                                            <span>CPU</span>
                                            <span><i class='bx bx-chevron-down'></i></span>
                                        </div>
                                        <div class="filter-content filter-cpu">
                                            <ul>
                                                <li data="Intel Pentinum">
                                                    <label for="data-cpu-1">
                                                        <input type="checkbox" id="data-cpu-1" value="Intel Pentinum">
                                                        Intel Pentinum
                                                    </label>
                                                    
                                                </li>
                                                <li data="Intel Core I3">
                                                    <label for="data-cpu-2">
                                                        <input type="checkbox" id="data-cpu-2" value="Intel Core I3">
                                                        Intel Core I3
                                                    </label>
            
                                                </li>
                                                <li data="Intel Core I5">
                                                    <label for="data-cpu-3">
                                                        <input type="checkbox" id="data-cpu-3" value="Intel Core I5">
                                                        Intel Core I5
                                                    </label>
                                                    
                                                </li>
                                                <li data="Intel Core I7">
                                                    <label for="data-cpu-4">
                                                        <input type="checkbox" id="data-cpu-4" value="Intel Core I7">
                                                        Intel Core I7
                                                    </label>
                                                    
                                                </li>
                                                <li data="Intel Core I9">
                                                    <label for="data-cpu-5">
                                                        <input type="checkbox" id="data-cpu-5" value="Intel Core I9">
                                                        Intel Core I9
                                                    </label>
                                                    
                                                </li>
                                                <li data="AMD Ryzen 3">
                                                    <label for="data-cpu-6">
                                                        <input type="checkbox" id="data-cpu-6" value="AMD Ryzen 3">
                                                        AMD Ryzen 3
                                                    </label>
                                                    
                                                </li>
                                                <li data="AMD Ryzen 5">
                                                    <label for="data-cpu-7">
                                                        <input type="checkbox" id="data-cpu-7" value="AMD Ryzen 5">
                                                        AMD Ryzen 5
                                                    </label>
                                                    
                                                </li>
                                                <li data="AMD Ryzen 7">
                                                    <label for="data-cpu-8">
                                                        <input type="checkbox" id="data-cpu-8" value="AMD Ryzen 7">
                                                        AMD Ryzen 7
                                                    </label>
                                                    
                                                </li>
                                                <li data="AMD Ryzen 9">
                                                    <label for="data-cpu-9">
                                                        <input type="checkbox" id="data-cpu-9" value="AMD Ryzen 9">    
                                                        AMD Ryzen 9
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div data-param="RAM" class="filter-group RAM">
                                    <div class="filter-wrapper">
                                        <div class="filter-title">
                                            <span>RAM</span>
                                            <span><i class='bx bx-chevron-down'></i></span>
                                        </div>
                                        <div class="filter-content filter-RAM">
                                            <ul>
                                                <li data-filter="acer">
                                                    <label for="data-RAM-1">
                                                        <input type="checkbox" id="data-RAM-1" value="8GB">
                                                        8GB
                                                    </label>
                                                </li>
                                                <li data-filter="asus">
                                                    <label for="data-RAM-2">
                                                        <input type="checkbox" id="data-RAM-2" value="16GB">
                                                        16GB
                                                    </label>
                                                    
                                                </li>
                                                <li data-filter="lenovo">
                                                    <label for="data-RAM-3">
                                                        <input type="checkbox" id="data-RAM-3" value="32GB">
                                                        32GB
                                                    </label>
                                                    
                                                </li>
                                                <li data-filter="MSI">
                                                    <label for="data-RAM-4">
                                                        <input type="checkbox" id="data-RAM-4" value="64GB">
                                                        64GB
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div data-param="Resolution" class="filter-group Resolution">
                                    <div class="filter-wrapper">
                                        <div class="filter-title">
                                            <span>Màn Hình</span>
                                            <span><i class='bx bx-chevron-down'></i></span>
                                        </div>
                                        <div class="filter-content filter-Resolution">
                                            <ul>
                                                <li data-filter="acer">
                                                    <label for="data-Resolution-1">
                                                        <input type="checkbox" id="data-Resolution-1" value="13 inch">
                                                        13 inch
                                                    </label>
                                                </li>
                                                <li data-filter="asus">
                                                    <label for="data-Resolution-2">
                                                        <input type="checkbox" id="data-Resolution-2" value="14 inch">
                                                        14 inch
                                                    </label>
                                                    
                                                </li>
                                                <li data-filter="lenovo">
                                                    <label for="data-Resolution-3">
                                                        <input type="checkbox" id="data-Resolution-3" value="15.6 inch">
                                                        15.6 inch
                                                    </label>
                                                </li>
                                                <li data-filter="MSI">
                                                    <label for="data-Resolution-4">
                                                        <input type="checkbox" id="data-Resolution-4" value="16 inch">
                                                        16 inch
                                                    </label>
                                                </li>
                                                <li data-filter="MSI">
                                                    <label for="data-Resolution-4">
                                                        <input type="checkbox" id="data-Resolution-5" value="17.3 inch">
                                                        17.3 inch
                                                    </label>
                                                </li>
                                                <li data-filter="MSI">
                                                    <label for="data-Resolution-4">
                                                        <input type="checkbox" id="data-Resolution-6" value="18 inch">
                                                        18 inch
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="container-collection-wrapper">
                        <div class="container-collection">
                            <div class="collection-product-name"><strong><?php echo $title ?></strong></div>
                            <div class="collection-sort">
                                <div class="sort-wrapper">
                                    <div class="sort-button"><i class='bx bx-sort-down'></i>
                                        <span class="sortlist_text">Xếp theo: </span>
                                        <span class="sortlist_value current_sort"><?php echo $orderby ?></span>
                                    </div>
                                    <div class="list_sort_wrapper sortby-option sortBy">
                                        <ul class="list_sort">
                                            <?php if($cat_id>0) { ?>
                                            <li class="list_sort_item" data-value="manual"><?php echo "<a href='index.php?page=collection&cat_id=".$cat_id."&orderby=manual'>" ?><span>Nổi bật</span></a></li>
                                            <li class="list_sort_item" data-value="price-acending"><?php echo "<a href='index.php?page=collection&cat_id=".$cat_id."&orderby=cost_asc'>" ?><span>Giá Tăng Dần</span></a></li>
                                            <li class="list_sort_item" data-value="price-descending"><?php echo "<a href='index.php?page=collection&cat_id=".$cat_id."&orderby=cost_des'>" ?><span>Giá Giảm Dần</span></a></li>
                                            <li class="list_sort_item" data-value="title-acending"><?php echo "<a href='index.php?page=collection&cat_id=".$cat_id."&orderby=name_asc'>" ?><span>A - Z</span></a></li>
                                            <li class="list_sort_item" data-value="title-descending"><?php echo "<a href='index.php?page=collection&cat_id=".$cat_id."&orderby=name_des'>" ?> <span>Z - A</span></a></li>
                                            <?php }else {?>
                                                <li class="list_sort_item" data-value="manual"><?php echo "<a href='index.php?page=collection&orderby=manual'>" ?><span>Nổi bật</span></a></li>
                                            <li class="list_sort_item" data-value="price-acending"><?php echo "<a href='index.php?page=collection&orderby=cost_asc'>" ?><span>Giá Tăng Dần</span></a></li>
                                            <li class="list_sort_item" data-value="price-descending"><?php echo "<a href='index.php?page=collection&orderby=cost_des'>" ?><span>Giá Giảm Dần</span></a></li>
                                            <li class="list_sort_item" data-value="title-acending"><?php echo "<a href='index.php?page=collection&orderby=name_asc'>" ?><span>A - Z</span></a></li>
                                            <li class="list_sort_item" data-value="title-descending"><?php echo "<a href='index.php?page=collection&orderby=name_des'>" ?> <span>Z - A</span></a></li>
                                            <?php } ?>
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
        