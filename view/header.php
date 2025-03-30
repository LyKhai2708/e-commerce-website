<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N TECH</title>
    <link rel="icon" href="image/logo.jpg" type="image/jpg">
    <link rel="stylesheet" href="layout/index.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="layout/account.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="layout/checkout.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="layout/product.css?v=<?php echo time();?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/af6fee153e.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<?php
    include "DAO/category.php";
    //thực hiện render category
    $category = get_cat_hot();
    $html_cat = '<ul class="dropdown-content">';
    foreach ($category as $c){
        
    $html_cat .='<li class="sub-item">
    <a href="index.php?page=collection&cat_id='.$c['id'].'" class="cat ">
                             <div class="catcontent-wrapper">
                                 <div class="icon-content">'.$c['category_name'].'</div>
                             </div>
                         </a>
                         </li>';
    }
    $html_cat .= '</ul>';
    // $html_cat='';
    // function has_child($data,$parentid){
    //     foreach($data as $cat){
    //         extract($cat);
    //     if($parent_id == $parentid){
    //         return true;
    //         }
    //     }
    //     return false;
    // }
    // function render_cat($data, $parentid = 0, $level = 0) {
    //     if ($level == 0)
    //       $result = '<ul class="dropdown-content">';
    //     else
    //       $result = '<ul class="submenu-2">';
    //     foreach($data as $row) {
            
    //       if ($row['parent_id'] == $parentid) {
    //         $result .= '<li class="sub-item">';
    //         $result .= '<a href="index.php?page=collection&cat_id='.$row['id'].'" class="cat ">
    //                         <div class="catcontent-wrapper">
    //                             <div class="icon-content">'.$row['category_name'].'</div>
    //                         </div>
    //                     </a>';
    //         if (has_child($data, $row['id'])) {
    //           $result .= render_cat($data, $row['id'], $level + 1);
    //         }
    //         $result .= '</li>';
    //       }
    //     }
      
    //     $result .= '</ul>';
      
    //     return $result;
    //   }
    //   $html_cat .= render_cat($category);
    //tinh gio hàng
    $count = 0;
    $cart = $_SESSION["cart"];
    if(!empty($cart)){
        foreach($cart as $item){
            $count += $item['quantity'];
        }
    }
?>
<body id="body">
        <header>
            <nav>
                <ul class="nav_link">
                    
                        <!-- <li><a href=""><i class="fa-regular fa-newspaper"></i> Tin công nghệ</a></li> -->
                        <li class="contact-nav"><a href="javascript:void(0)"><i class="fa-solid fa-headset"></i>Liên Hệ</a>
                            <ul class=contact-dropdown>
                                <li>Hotline: 0896670687</li>
                            </ul>
                        </li>
                        <li><a href="index.php?page=collection"><i class='bx bxl-product-hunt'></i></i>Sản Phẩm</a></li>
                </ul>
            </nav>
            <div id="container">
                <div id="container-content" role="navigation">
                        <div class="logo">
                            <a href="index.php" title="Home Page" rel="home">
                                <img src="image/logot.png" >
                            </a>
                        </div>
                        <div class="Category">
                            <button id="button-cat"><span> Danh mục sản phẩm</span></button>
                            <div class = 'dropdown-category'>
                            <?= $html_cat?>
                                <!-- <ul class='dropdown-content'>
                                    <li class="sub-item">
                                        <a href="#" class="cat ">
                                            <div class="catcontent-wrapper">
                                                <div class="icon"><i class='bx bx-laptop'></i></div>
                                                <div class="icon-content"> Laptop</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="sub-item">
                                        <a href="#" class="cat monitor">
                                            <div class="catcontent-wrapper">
                                                <div class="icon"><i class='bx bx-desktop'></i></div>
                                                <div class="icon-content"> Màn hình máy tính</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="sub-item">
                                        <a href="#" class="cat PC">
                                            <div class="catcontent-wrapper">
                                                <div class="icon" ><i class="fa-solid fa-computer"></i></div>
                                                <div class="icon-content"> PC - Máy tính Bộ</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="sub-item">
                                        <a href="#" class="cat PCcp">
                                            <div class="catcontent-wrapper">
                                                <div class="icon"><i class='bx bx-chip'></i></div>
                                                <div class="icon-content"> Linh kiện máy tính</div>
                                            </div>
                                        </a>
                                        <ul class="submenu-2">
                                            <li class="sub-item">
                                                <a href="#" class="cat PCcp RAM">
                                                    <span class="name-sub">RAM -Bộ Nhớ Trong</span>
                                                </a>
                                            </li>
                                            <li class="sub-item">
                                                <a href="#" class="cat PCcp RAM">
                                                    <span class="name-sub">CPU - Vi xử lý</span>
                                                </a>
                                            </li>
                                            <li class="sub-item">
                                                <a href="#" class="cat PCcp RAM">
                                                        <span class="name-sub">Case - Thùng Máy</span>
                                                </a>
                                            </li>
                                            <li class="sub-item">
                                                <a href="#" class="cat PCcp RAM">
                                                        <span class="name-sub">Main Board - Bo Mạch</span>
                                                </a>
                                            </li>
                                            <li class="sub-item">
                                                <a href="#" class="cat PCcp RAM">
                                                        <span class="name-sub">VGA - Card Đồ Họa</span>
                                                </a>
                                            </li>
                                            <li class="sub-item">
                                                <a href="#" class="cat PCcp RAM">
                                                    <span class="name-sub">SSD - HDD</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sub-item"> 
                                        <a href="#" class="cat ">
                                            <div class="catcontent-wrapper">
                                                <div class="icon"><i class='bx bx-mouse' ></i></div>
                                                <div class="icon-content"> Phụ Kiện Máy Tính</div>
                                            </div>
                                        </a>
                                        <ul class="submenu-2">
                                            <li class="sub-item">
                                                <a href="#" class="cat PCcp mouse">
                                                    <span class="name-sub">Chuột</span>
                                                </a>
                                            </li>
                                            <li class="sub-item">
                                                <a href="#" class="cat PCcp pad">
                                                        <span class="name-sub">Lót Chuột</span>
                                                </a>
                                            </li>
                                            <li class="sub-item">
                                                <a href="#" class="cat PCcp earphone">
                                                    <span class="name-sub">Tai Nghe</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li> 
                                </ul> -->
                            </div>
                        </div>
                    <form method="GET" action="" class="search" title="Submit">
                            <input type="hidden" name="page" value="search">
                            <input type="text" name="kw" placeholder="Nhập tên sản phẩm cần tìm..." autocomplete="on">
                            <button name="search"title="find" type="submit"><i class="fa-solid fa-magnifying-glass"></i> </button>
                    </form>
                    <div id="cart">
                        <div class="button" title="Cart">
                            <a href="javascript:void(0)" >
                                <i class='bx bx-cart-alt'></i>
                                <span class="countAmount-cart"><?=$count ?></span>
                            </a>
                        </div>
                        <div class="cart-dropdown-wrapper">
                            <?php if(empty($cart)){?>
                            <div class="cart-dropdown-content not-have-product">
                                <div class="img-cart-dropdown"><img src="image/cart-img-empty.png" alt=""></div>
                                <span class="empty-cart-content">Chưa có sản phẩm trong giỏ hàng</span>
                                <div class="line"></div>
                                <a href="index.php?page=cart" class="button-checkout-drop-cart">Xem Giỏ Hàng</a>
                            </div>
                            <?php }else{ $total=0 ?>
                            <div class="cart-hpro-content">
                                <?php foreach($cart as $item) {
                                    $price_no = format_money($item['cost_now']);
                                    if($item['cost_discount'] != null){
                                        $price_d = format_money($item['cost_discount']);
                                        $price_c = '<span class="cost-compare"><del>'.$price_d.'</del></span>';
                                    }else{
                                            $price_c = '';
                                    }
                                    
                                ?>
                                <div class="cart_detail">
                                    <div class="cart_img"><img src="upload/<?=$item['product_avt']?>" alt="" srcset=""></div>
                                    <div class="cart_pro_detail">
                                        <p><?=$item['product_name']?></p>
                                        <div class="cart_pro_cost">
                                            <span class="price-now"><?=$price_no?></span>
                                            <?= $price_c ?>
                                        </div>
                                        <div class="cart_p_count">Số lượng: <?=$item['quantity']?></div>
                                    </div>
                                </div>
                                <?php $total = $total + $item['cost_now']*$item['quantity'];
                                } ?>
                                <hr>
                                <div class="cart-footer">
                                    <p>Tổng tiền: <span class="sum"><?= format_money($total)?></span></p> 
                                </div>
                                <a href="index.php?page=cart" class="button-checkout-drop-cart">Xem Giỏ Hàng</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                        if(isset($_SESSION['user'])) {
                            extract($_SESSION['user']);
                            ?>
                        <div id="login" title="login/register">
                            <a href="javascript:void(0)" class="content-lg-dropdown">
                                <i class="fa-regular fa-user"></i> 
                                <span>Xin chào <?php echo $user_name ?></span>
                            </a>
                            <div class="login-register-dropdown m-hidden">
                                <div class="loggedin-dropdown">
                                    <div class="logged-in-text">
                                        <a href="index.php?page=account"><i class='bx bx-user-circle'></i>Thông tin tài khoản</a>
                                        <a href="?page=orderlist"><i class='bx bx-package'></i>Thông tin đơn hàng</a>
                                        <!-- <a href="?page=address"><i class='bx bx-location-plus'></i>Danh sách địa chỉ</a> -->
                                        <div class="line"></div>
                                        <a href="?page=logout"><i class='bx bx-door-open'></i>Đăng xuất</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }else{ ?>
                    <div id="login" title="login/register">
                        <a href="javascript:void(0)" class="content-lg-dropdown">
                            <i class="fa-regular fa-user"></i> 
                            <span>Đăng nhập/Đăng kí</span>
                        </a>
                        <div class="login-register-dropdown m-hidden">
                            <div class="login-register-notlogged-dropdown">
                                <div class="login-register-text">Xin chào, vui lòng đăng nhập</div>
                                <div class="action-button">
                                    <button class="btn-login btn-action">Đăng nhập</button>
                                    <button class="btn-register btn-action">Đăng ký</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div> 
            </div>
        </header>
        
    <?php
    
    if(isset($_SESSION['status-false'])) {
    ?>
    <div class="alert alert-danger">
        <i class="fa-solid fa-triangle-exclamation"></i><span><?php echo $_SESSION['status-false']  ?></span>
    </div>
    <?php unset($_SESSION['status-false']);}else if(isset($_SESSION['status-success'])){ ?>
        <div class="alert alert-success">
            <i class="fa-solid fa-circle-check"></i><span><?php echo $_SESSION['status-success']  ?></span>
        </div>   
    <?php unset($_SESSION['status-success']);}?>