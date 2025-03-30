<?php
    //load laptop
    $html_all = '';
    foreach($category_hot as $cat){
        $html_all .= '<div class="container-product laptop ">
        <div class="product-list-name"><strong>'.$cat['category_name'].'</strong></div>
        <div class="product-list">';
        $list_hot = get_new_product($cat['id']);
        foreach ($list_hot as $item){
            extract($item);
            $price_n = format_money($price_now);
            if($price_discount != null){
                $price_d = format_money($price_discount);
                $price_com = '<span class="CostBeforeSale"><del>'.$price_d.'</del></span>';
            }else
            {
                $price_com = '';
            }
            $html_all .= '
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
        $html_all .= '</div>
        <div class="button-product"><a href="index.php?page=collection&cat_id='.$cat['id'].'">Xem tất cả</a></div>
        </div>';
    }
?>

        <div id ='slider' class="slider">
            <div class="list-image">
                <div class="image"><img src="image/slidertest2.png" alt=""></div>
                <div class="image"><img src="image/slidertest.png" alt=""></div>
                <div class="image"><img src="image/slidertest3.webp" alt=""></div>
                <div class="image"><img src="image/slider4.jpg" alt=""></div>
                <div class="image"><img src="image/slider5.jpg" alt=""></div>
            </div>
            <div class="controller">
                <div id="prev" class="button Prev"><i class='bx bx-chevron-left'></i></div>
                <div id="next" class="button Next"><i class='bx bx-chevron-right'></i></div>
            </div>
            <div class="index-image">
                <div class="index-item"></div>
                <div class="index-item"></div>
                <div class="index-item"></div>
                <div class="index-item"></div>
                <div class="index-item"></div>
            </div>
        </div>
        
        <div class="button-scroll-back"><i class='bx bxs-up-arrow'></i></div>
        <!--content-->
        <div class="main-content">
            <!-- <section class="categorys-hot-container">
                <div class="categorys-hot-title"><strong>Danh Mục Sản Phẩm</strong></div>
                <section class="categorys-hot">
                    <div class="category-hot-wrapper">
                        <div class="category-hot-image"><a href=""><img src="category-section-image/laptop.webp" alt="" srcset=""></a></div>
                        <div class="category-hot-title"><a href="">Laptop</a></div>
                    </div>
                    <div class="category-hot-wrapper">
                        <div class="category-hot-image"><a href=""><img src="category-section-image/banphim.webp" alt="" srcset=""></a></div>
                        <div class="category-hot-title"><a href="">Bàn Phím</a></div>
                    </div>
                    <div class="category-hot-wrapper">
                        <div class="category-hot-image"><a href=""><img src="category-section-image/earphone.webp" alt="" srcset=""></a></div>
                        <div class="category-hot-title"><a href="">Tai Nghe</a></div>
                    </div>
                    <div class="category-hot-wrapper">
                        <div class="category-hot-image"><a href=""><img src="category-section-image/monitor.webp" alt="" srcset=""></a></div>
                        <div class="category-hot-title"><a href="">Màn Hình</a></div>
                    </div>
                    <div class="category-hot-wrapper">
                        <div class="category-hot-image"><a href=""><img src="category-section-image/mouse.webp" alt="" srcset=""></a></div>
                        <div class="category-hot-title"><a href="">Chuột</a></div>
                    </div>
                    <div class="category-hot-wrapper">
                        <div class="category-hot-image"><a href=""><img src="category-section-image/RAM.webp" alt="" srcset=""></a></div>
                        <div class="category-hot-title"><a href="">RAM</a></div>
                    </div>
                    <div class="category-hot-wrapper">
                        <div class="category-hot-image"><a href=""><img src="category-section-image/case.webp" alt="" srcset=""></a></div>
                        <div class="category-hot-title"><a href="">Case</a></div>
                    </div>
                    <div class="category-hot-wrapper">
                        <div class="category-hot-image"><a href=""><img src="category-section-image/vga.webp" alt="" srcset=""></a></div>
                        <div class="category-hot-title"><a href="">VGA</a></div>
                    </div>
                    <div class="category-hot-wrapper">
                        <div class="category-hot-image"><a href=""><img src="category-section-image/cpu.webp" alt="" srcset=""></a></div>
                        <div class="category-hot-title"><a href="">CPU</a></div>
                    </div>
                    <div class="category-hot-wrapper">
                        <div class="category-hot-image"><a href=""><img src="category-section-image/main-board.webp" alt="" srcset=""></a></div>
                        <div class="category-hot-title"><a href="">Main Board</a></div>
                    </div>
                </section>
            </section> -->
            <?=$html_all?>
            <!-- <div class="container-news">
                <div class="news-tag"><strong>TIN TỨC CÔNG NGHỆ</strong> <div class="button-news"><a href="">Xem tất cả <i class='bx bxs-chevrons-right'></i></a></div></div>
                <div class="news-list">
                    <div class="news-card">
                        <a href="#">
                            <div class="news-image">
                                <img src="news/lenovochipAI.webp" alt="" srcset="">
                            </div>
                            <div class="news-title">
                                <span>Lenovo Tích Hợp Chip AI Cho Laptop Gaming Legion Series</span>
                            </div>
                        </a>
                    </div>
                    <div class="news-card">
                        <a href="#">
                            <div class="news-image">
                                <img src="news/laptopacerpredatorhelios2023.webp" alt="" srcset="">
                            </div>
                            <div class="news-title">
                                <span>ACER TRÌNH LÀNG LAPTOP GAMING PREDATOR HELIOS 16 & 18...</span>
                            </div>
                        </a>
                    </div>
                    <div class="news-card">
                        <a href="#">
                            <div class="news-image">
                                <img src="news/ssdcaithientrainghiem.webp" alt="" srcset="">
                            </div>
                            <div class="news-title">
                                <span>SSD Có Thể Cải Thiện Trải Nghiệm Chơi Game Ra Sao?</span>
                            </div>
                        </a>
                    </div>
                    <div class="news-card">
                        <a href="#">
                            <div class="news-image">
                                <img src="news/laptopmsimoi.webp" alt="" srcset="">
                            </div>
                            <div class="news-title">
                                <span>Loạt Laptop MSI mới: Cấu hình mạnh hơn, thiết kế đầy sáng tạo</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div> -->
        </div>