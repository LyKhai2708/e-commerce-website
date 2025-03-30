<?php
    session_start();
    ob_start();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    include 'DAO/connectdb.php';
    include 'DAO/product.php';
    include "view/header.php";
    include 'DAO/user.php';
    include 'DAO/brand.php';
    include 'DAO/giohang.php';
    include 'DAO/location.php';
    include 'DAO/order.php';
    $category_hot = get_cat_hot();
    if(!isset($_GET['page']))
    {
        include "view/home.php";
    }
    else{
        switch ($_GET['page']){
            case 'collection':
                $by = "";
                $order="";
                $orderby="";
                if(!isset($_GET['cat_id']) && !isset($_GET['orderby'])){
                    $title='Tất cả sản phẩm';
                    $cat_id='0';
                    $by = "id";
                    $order="ASC";
                    $orderby="Nổi bật";
                }else if( isset($_GET['cat_id']) && (!isset($_GET['orderby']) || $_GET['orderby'] == "manual")){
                    $title = get_name_cat($_GET['cat_id']);
                    $cat_id=$_GET['cat_id'];
                    $by="id";
                    $order="ASC";
                    $orderby="Nổi bật";
                }else if(isset($_GET['cat_id']) && (isset($_GET['orderby']))){
                    $title = get_name_cat($_GET['cat_id']);
                    $cat_id=$_GET['cat_id'];
                    switch($_GET['orderby']){
                        case "cost_des":
                            $by="price_now";
                            $order="DESC";
                            $orderby="Giá Giảm Dần";
                            break;
                        case 'cost_asc':
                            $by="price_now";
                            $order="ASC";
                            $orderby="Giá Tăng Dần";
                            break;
                        case 'name_des':
                            $by="product_name";
                            $order="DESC";
                            $orderby="A-Z";
                            break;
                        case 'name_asc':
                            $by="product_name";
                            $order="ASC";
                            $orderby="Z-A";
                            break;
                        default:
                            $by = "id";
                            $order="ASC";
                            $orderby="Nổi bật";
                            break;
                    }
                }else if(!isset($_GET['cat_id']) && (isset($_GET['orderby']))){
                    $title = "Tất cả sản phẩm";
                    $cat_id=0;
                    switch($_GET['orderby']){
                        case "cost_des":
                            $by="price_now";
                            $order="DESC";
                            $orderby="Giá Giảm Dần";
                            break;
                        case 'cost_asc':
                            $by="price_now";
                            $order="ASC";
                            $orderby="Giá Tăng Dần";
                            break;
                        case 'name_des':
                            $by="product_name";
                            $order="DESC";
                            $orderby="A-Z";
                            break;
                        case 'name_asc':
                            $by="product_name";
                            $order="ASC";
                            $orderby="Z-A";
                            break;
                        default:
                            $by = "id";
                            $order="ASC";
                            $orderby="Nổi bật";
                            break;
                    }
                }
                $collection_k = get_collection($cat_id,$by,$order);
                include "view/collection.php";
                break;
            case 'logout':
                if(isset($_SESSION['user']) && (count($_SESSION['user']) > 0)){
                unset($_SESSION['user']);
                $_SESSION['cart']=[];
                echo '<script type="text/javascript">window.location.href="index.php"</script>';
                }
                break;
            case 'product':
                if(isset($_GET['pid'])){
                    $id = $_GET['pid'];
                    $product = get_product_fromid($id);
                    $gallery = get_Gallery($id);
                    $brand = getBrandname($product['brandid']);
                    $cat_name = get_cat_from_pid($id);
                    $specifies = get_product_specifies($id);
                    include 'view/product.php';
                }else{
                    include "view/home.php";
                }
                break;
            case 'account':
                    if(isset($_SESSION['user']) && (count($_SESSION['user']) > 0)){
                        include 'view/account.php';
                    }
                break;
            case 'updatecus':
                    if(isset($_POST["updateuser"]) && ($_POST["updateuser"])){
                        $cusname = $_POST['user-name'];
                        $cusmail = $_POST['user-email'];
                        $cuspass =$_POST['user-pass'];
                        $cusphone = $_POST['user-phone'];
                        $input_date = $_POST['user-birth'];
                        $cusbirth=date("Y-m-d H:i:s",strtotime($input_date));
                        $cusgender =$_POST['user-gender'];
                        $cusid =$_POST['user-id'];
                        $result = updateuser($cusname, $cusmail, $cuspass, $cusphone,$cusgender,$cusbirth,$cusid);
                        if($result){
                            
                            $_SESSION['status-success']="Cập nhập tài khoản thành công";
                            $_SESSION['user']= getuserbyid($id);
                            header("location: index.php?page=account");
                        }else {
                            $_SESSION['status-false']="Cập nhập tài khoản thất bại";
                            header("location: index.php?page=account");

                        }
                    }
                break;
                case 'addtoCart':
                    if(isset($_POST["button-addcart"]) && ($_POST["button-addcart"])){
                        $id = $_POST['product_id'];
                        $product_img = $_POST['product_img'];
                        $product_name = $_POST['product_name'];
                        $cost_now = $_POST['cost_now'];
                        $cost_discount = $_POST['cost_discount'];
                        $quantity = 1;
                        if(check_duplicate($id) >= 0){
                            $pos = check_duplicate($id);
                            update_cart($pos,$quantity);
                        }else{
                            $product = array('id'=> $id,'product_avt'=>$product_img,'product_name'=>$product_name,'cost_now'=>$cost_now,'cost_discount'=> $cost_discount,'quantity'=>$quantity);
                            array_push($_SESSION['cart'],$product);
                        }
                        if(isset($_SESSION['user'])){
                            $user = $_SESSION['user'];
                            if(check_duplicate_db($user['id'],$id) > 0){
                                updatequantity($user['id'],$id,$quantity);
                                echo "đã cập nhật";
                            }else{
                                addcart($user['id'],$id,$quantity);
                            }
                        }
                        echo '<script type="text/javascript">window.history.back();</script>';
                        $_SESSION['status-success']="Đã thêm sản phẩm vào giỏ hàng";
                    }
                    if(isset($_POST["button-buynow"]) && ($_POST["button-buynow"])){
                        $id = $_POST['product_id'];
                        $product_img = $_POST['product_img'];
                        $product_name = $_POST['product_name'];
                        $cost_now = $_POST['cost_now'];
                        $cost_discount = $_POST['cost_discount'];
                        $quantity = 1;
                        if(check_duplicate($id) >= 0){
                            $pos = check_duplicate($id);
                            update_cart($pos,$quantity);
                        }else{
                            $product = array('id'=> $id,'product_avt'=>$product_img,'product_name'=>$product_name,'cost_now'=>$cost_now,'cost_discount'=> $cost_discount,'quantity'=>$quantity);
                            array_push($_SESSION['cart'],$product);
                        }
                        if(isset($_SESSION['user'])){
                            $user = $_SESSION['user'];
                            if(check_duplicate_db($user['id'],$id) > 0){
                                updatequantity($user['id'],$id,$quantity);
                                echo "đã cập nhật";
                            }else{
                                addcart($user['id'],$id,$quantity);
                            }
                        }
                        header("Location: index.php?page=cart");
                    }
                break;
                case 'cart':
                    include "view/cart.php";
                break;
                case 'delcart':
                    if(isset($_GET["id"]) && ($_GET["id"])){
                        $id =$_GET["id"]; 
                        for($i = 0; $i < sizeof($_SESSION['cart']); $i++){
                            if($_SESSION['cart'][$i]['id'] == $id){
                                array_splice($_SESSION['cart'],$i,1);
                                break;
                            }
                        }
                        if(isset($_SESSION['user'])){
                            $user = $_SESSION['user'];
                            $userid= $user['id'];
                            detele_product_cart_user($userid,$id);
                        }
                    }
                    header('location: index.php?page=cart');
                break;
                case 'minuscart':
                    if(isset($_GET['id'])){
                        $id =$_GET['id'];
                        $pos = check_duplicate($id); //lấy vị trí sản phẩm trong session
                        update_minus1_cart($pos);
                        if(isset($_SESSION['user'])){
                            $user = $_SESSION['user'];
                            $userid= $user['id'];
                            quantityminus($userid,$id);
                        }
                    }
                    header('Location: index.php?page=cart');
                break;
                case 'pluscart':
                    if(isset($_GET['id'])){
                        $id =$_GET['id'];
                        $product = get_product_fromid($id);
                        $stock = $product['stock'];
                        $pos = check_duplicate($id);
                        $qt = $_SESSION['cart'][$pos]['quantity'];
                        if($stock >= $qt + 1){
                        update_plus1_cart($pos);
                        if(isset($_SESSION['user'])){
                            $user = $_SESSION['user'];
                            $userid= $user['id'];
                            quantityplus($userid,$id);
                        }
                        }else{
                            $_SESSION['status-false']="Trong kho số lượng không đủ";
                        }
                    }
                    header('Location: index.php?page=cart');
                break;
                case 'checkout':
                    if(!isset($_SESSION['user'])){
                        $_SESSION['status-false']="Vui lòng đăng nhập trước khi thanh toán";
                        header('Location: index.php?page=cart');
                    }
                    else if(empty($_SESSION['cart'])){
                        $_SESSION['status-false']="Giỏ hàng trống hãy tiếp tục mua hàng";
                        header('Location: index.php?page=cart');
                    }else{
                    $city = get_city();
                    include "view/checkout.php";
                    }
                break;
                case 'order':
                    if(isset($_POST['order'])){
                        $userid = $_SESSION['user']['id'];
                        $cus_name = $_POST['fullname'];
                        $cus_phone = $_POST['phone'];
                        $cus_email = $_POST['email'];
                        $note = $_POST['order-note'];
                        $city = get_city_name($_POST['user-city']);
                        $district = get_district_name($_POST['user-district']);
                        $ward = get_ward_name($_POST['user-ward']);
                        $address =$_POST['user-dt-address'].", ".$ward['name'].", ".$district['name'].", ".$city['name'];
                        $total_price =$_POST['total-cost-order'];
                        $total_discount = 0;
                        $pay_by = $_POST['pay-type'];
                        $id = "N0608".$userid.date("dMyhis");
                        $addoder = add_order($id, $total_price, $note, $pay_by, $address, $cus_phone, $cus_name, $userid,$cus_email);
                        if($addoder>0){
                            foreach($_SESSION['cart'] as $item){
                                $pd_quantity = $item['quantity'];
                                $cost_now =$item['cost_now'];
                                $total_price = $cost_now * $pd_quantity;
                                $orderid = $id;
                                $proid = $item['id'];
                                add_order_product($pd_quantity, $cost_now, $total_price, $orderid, $proid);
                                $product = get_product_fromid($proid);
                                $stock = $product['stock'];
                                $newstock = $stock - $pd_quantity;
                                stock_update($newstock,$proid);
                            }
                            $_SESSION['cart'] = [];
                            detele_product_cart($userid);
                        }
                        $_SESSION['status-success']="Đã đặt hàng thành công ";
                        header("Location: index.php?page=orderdetail&id=$id");
                    }
                break;
                case 'orderlist':
                    if(isset($_SESSION['user'])){
                    $id = $_SESSION['user']['id'];
                    $orders = get_All_order($id);
                    include 'view/orderlist.php';
                    }
                break;
                case 'orderdetail':
                    $order="";
                    $orderby="";
                    $by ="";
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $order = get_order_by_id($id);
                        $product = get_all_order_product($id);
                        include 'view/orderdetail.php';
                    }
                break;
                case 'search':
                    $kw = "";
                    if(isset($_GET['kw']) && ($_GET['kw'])){
                        $kw = $_GET['kw'];
                    }
                    if(!isset($_GET['orderby'])){
                        $order="ASC";
                        $orderby="Nổi bật";
                        $by ="id";
                    }else {
                        switch($_GET['orderby']){
                            case "cost_des":
                                $by="price_now";
                                $order="DESC";
                                $orderby="Giá Giảm Dần";
                                break;
                            case 'cost_asc':
                                $by="price_now";
                                $order="ASC";
                                $orderby="Giá Tăng Dần";
                                break;
                            case 'name_des':
                                $by="product_name";
                                $order="DESC";
                                $orderby="A-Z";
                                break;
                            case 'name_asc':
                                $by="product_name";
                                $order="ASC";
                                $orderby="Z-A";
                                break;
                            default:
                                $by = "id";
                                $order="ASC";
                                $orderby="Nổi bật";
                                break;
                        }
                    }
                    $collection_search = search_product($kw,$by,$order);
                    include 'view/collection-search.php';
                break;
                case "password":
                    if(isset($_SESSION['user'])){
                        include 'view/changePassword.php';
                    }
                break;
                case "changepass":
                        if(isset($_POST['btn-changepass']) && ($_POST['btn-changepass'])){
                            $user= $_SESSION['user'];
                
                            $oldpass= $_POST['user-old-pass'];
                            $newpass= $_POST['user-new-pass'];
                            $repass = $_POST['user-re-new-pass'];
                            if($newpass != $repass){
                                $_SESSION['status-false']="Mật khẩu nhập lại không đúng";
                                header("location: index.php?page=password");
                            }else if($oldpass === $user['password']){
                                updatepass($newpass,$user['id']);
                                $newuser = getuserbyid($user['id']);
                                $_SESSION['user'] = $newuser;
                                $_SESSION['status-success']="Đã cập nhật mật khẩu thành công";
                                header("location: index.php?page=account");
                            }else{
                                $_SESSION['status-false']="Mật khẩu cũ không đúng";
                                header("location: index.php?page=password");
                            }
                        }
                break;
            default:
                include "view/home.php";
                break;
        }
    }
    include "view/footer.php";
?>
