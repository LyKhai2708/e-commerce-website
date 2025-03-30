<?php
    session_start();
    ob_start();
    if(isset($_SESSION['user']) && $_SESSION['user']['roleid'] = 1){
    define('NUMBER_RECORD', 4);
    include "header.php";
    include "sidebar.php";
    include "../DAO/product.php";
    include "../DAO/order.php";
    include "../DAO/user.php";
    include "../DAO/category.php";
    include "../DAO/brand.php";
    include "../DAO/gallery.php";
    include "../DAO/specifies.php";
    //load du lieu trang chu
    $numpro = countProduct();
    $numord= count_order();
    $numuser = count_user();
    if(isset($_GET['control'])){
        switch($_GET['control']){
            case "category":
                $category = get_all_cat();
                include "view/category.php";
                include "view/addcat.php";
            break;
            case "delcat":
                if(isset($_GET['id'])){
                        if(!check_empty_cat($_GET['id'])){
                            detele_category($_GET['id']);
                            $_SESSION['status-success']="Đã xóa danh mục thành công";
                            header("Location: index.php?control=category");
                        }else{
                            $_SESSION['status-false']="Hãy xóa sản phẩm ra khỏi danh mục trước";
                            header("Location: index.php?control=category");
                        }
                }
            break;
            case 'changeStatuscat':
                if((isset($_GET['id'])) && isset($_GET['home'])){
                    $id = $_GET['id'];
                    if($_GET['home'] == 0){
                        home_update(0,$_GET['id']);
                        $_SESSION['status-success']="Đã gỡ danh mục xuống";
                        header("Location: index.php?control=category");
                    }else {
                        if(get_product_fromcat($id)){
                            home_update(1,$_GET['id']);
                            $_SESSION['status-success']="Đã đưa danh mục lên";
                            header("Location: index.php?control=category");
                        }else{
                            $_SESSION['status-false']="Danh mục phải có sản phẩm";
                            header("Location: index.php?control=category");
                        }
                    }
                }
                break;
            case 'addcategory':
                if(isset($_POST['addcat'])){
                    $category_name = $_POST['category_name'];
                    $add = add_cat($category_name);
                    if($add){
                        $_SESSION['status-success']="Thêm danh mục thành công hãy thêm sản phẩm";
                        header("Location: index.php?control=category");
                    }else {
                        $_SESSION['status-false']="Đã có lỗi trong việc thêm";
                        header("Location: index.php?control=category");
                    }
                }
            break;
            case 'addproduct':
                if(isset($_POST['btn-add-pro'])){
                    $product_name = $_POST['product_name'];
                    $price_now = $_POST['cost_now'];
                    $price_discount = $_POST['cost_compare'];
                    $warranty = $_POST['warranty'];
                    $brandid = $_POST['brand'];
                    $product_des = $_POST['product_des'];
                    $stock = $_POST['stock'];
                    $avt = $_FILES['product_avt']['name'];
                    $temp = $_FILES['product_avt']['tmp_name'];
                    $filetype = $_FILES['product_avt']['type'];
                    $categoryid = $_POST['category'];
                    if($price_discount < $price_now){
                        $_SESSION['status-false']="Giá hiện tại phải bé hơn giá thị trường!";
                    }else{
                        if($filetype == 'image/jpeg' ||  $filetype == 'image/jpg' || $filetype == 'image/png' || $filetype == 'image/webp'){
                            uploadfile($avt,$temp);
                        }else {
                            echo "sai file avt";
                            $avt = " ";
                        }
                    
                        $id = addproduct($product_name, $categoryid, $avt, $product_des, $price_now, $price_discount, $warranty, $brandid, $stock);
                        if(isset($_FILES['gallery'])){
                            $file_name = $_FILES['gallery']['name'];
                            foreach($file_name as $key => $value){
                                if($_FILES['gallery']['type'][$key] == 'image/jpeg' ||  $_FILES['gallery']['type'][$key] == 'image/jpg' || $_FILES['gallery']['type'][$key] == 'image/png' ||$_FILES['gallery']['type'][$key] == 'image/webp'){
                                    uploadfile($value,$_FILES['gallery']['tmp_name'][$key]);
                                    insertGallery($value,$id);
                                }else {
                                    echo "sai file gal";
                                    $value = " ";
                                }
                            }
                        }
                    }
                    header("Location: index.php?control=product");
                }
            break;
            case 'editProduct':
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    $product = get_product_fromid($_GET['id']);
                    $gallery = get_path_gallery($_GET['id']);
                    include 'view/editproduct.php';
                }
            break;
            case 'updateproduct':
                if(isset($_POST['btn-update-pro'])){
                    $id = $_POST['id'];
                    $product_name = $_POST['product_name'];
                    $price_now = $_POST['cost_now'];
                    $price_discount = $_POST['cost_compare'];
                    $warranty = $_POST['warranty'];
                    $brandid = $_POST['brand'];
                    $product_des = $_POST['product_des'];
                    $stock = $_POST['stock'];
                    $avt = $_FILES['product_avt']['name'];
                    $categoryid = $_POST['category'];
                    $temp = $_FILES['product_avt']['tmp_name'];
                    if(empty($avt)){
                        $avt = $_POST['cur-img'];
                    }else{
                    uploadfile($avt,$temp);
                    $oldavt = $_POST['cur-img'];
                    $oldavtdir = "../upload/".$oldavt;
                    deloldfile($oldavtdir);
                    }
                    $update = updateproduct($product_name, $categoryid, $avt, $product_des, $price_now, $price_discount, $warranty, $brandid, $stock,$id);
                    if(isset($_FILES['gallery']) && $_FILES['gallery'] != ""){
                        $file_name = $_FILES['gallery']['name'];
                        
                        if(!empty($file_name[0])){
                        del_gallery($id);
                        $path = get_path_gallery($id);
                        if(del_gallery($id) && $path > 0){
                        foreach($path as $p){
                            $old_p = "../upload/".$p['img_path'];
                            deloldfile($old_p);
                        }
                        }
                        foreach($file_name as $key => $value){
                            if($_FILES['gallery']['type'][$key] == 'image/jpeg' ||  $_FILES['gallery']['type'][$key] == 'image/jpg' || $_FILES['gallery']['type'][$key] == 'image/png' ||$_FILES['gallery']['type'][$key] == 'image/webp'){
                                uploadfile($value,$_FILES['gallery']['tmp_name'][$key]);
                                $i = insertGallery($value,$id);
                            }else {
                                echo "sai file gal";
                                $value = " ";
                            }
                        }
                        }   
                    }
                    if($update){
                    $_SESSION['status-success']="Cập nhật thành công";
                    }else{
                        $_SESSION['status-false']="Có lỗi trong việc cập nhật";
                    }
                    
                    header("Location: index.php?control=editProduct&id=".$id);
                }
            break;
            case 'product':
                if(isset($_GET['page']) && $_GET['page'] > 0 ){
                    $cur_page = $_GET['page'];
                }else {
                    $cur_page = 1;
                }
                if(isset($_GET['catid']) && $_GET['catid'] >0) {
                   $cat_now =  $_GET['catid'];
                }else {
                    $cat_now = 0;
                }
                if(isset($_GET['kw']) && $_GET['kw'] != ""){
                    $kw =  $_GET['kw'];
                }else{
                    $kw = "";
                }
                $product = get_All_product_page($cur_page,$cat_now,$kw);
                $category = get_all_cat();
                include "view/product.php";
                include "view/addpro.php";
            break;
            case 'prodel':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    del_cart($id);
                    del_orderdetail($id);
                    $path = get_path_gallery($id);
                    if(del_gallery($id) && $path > 0){
                        foreach($path as $p){
                            $old_p = "../upload/".$p['img_path'];
                            deloldfile($old_p);
                        }
                    }
                    del_prosp($id);
                    $product = get_product_fromid($id);
                    $olddir = "../upload/".$product['avt'];
                    if(detele_product($id)){
                    deloldfile($olddir);
                    $_SESSION['status-success']="Đã xóa sản phẩm";
                    }else {
                    $_SESSION['status-false']="Có lỗi";
                    }
                    header("Location: index.php?control=product");
                }
            break;
            case 'user':
                $user = getallcus();
                include "view/user.php";
            break;
            case 'brand':
                $brand = getallbrand();
                include "view/brand.php";
                include "view/addbrand.php";
            break;
            case 'addbrand':
                if(isset($_POST['btn-addbrand'])){
                    $brandname = $_POST['brand_name'];
                    if(checkbrandname($brandname)){
                        $_SESSION['status-false']="Thương hiệu này đã có!";
                        header("Location: index.php?control=brand");
                    }else{
                    addbrand($brandname);
                    $_SESSION['status-success']="Thêm thành công!";
                    header("Location: index.php?control=brand");
                    }
                }
            break;
            case 'delbrand':
                if((isset($_GET['id'])) && $_GET['id']>0){
                    $id = $_GET['id'];
                    if(get_product_brand($id) > 0){
                        $_SESSION['status-false']="Thương hiệu này vẫn còn sản phẩm trong hệ thống!";
                        header("Location: index.php?control=brand");
                    }else{
                        detele_brand($id);
                        $_SESSION['status-success']="Đã xóa thương hiệu";
                        header("Location: index.php?control=brand");
                    }
                }
            break;
            case 'changeprostatus':
                if((isset($_GET['id'])) && isset($_GET['status'])){
                    $id = $_GET['id'];
                    if($_GET['status'] == 0){
                        pro_status_update(0,$_GET['id']);
                        $_SESSION['status-success']="Đã gỡ sản phẩm xuống";
                        echo '<script type="text/javascript">window.history.back();</script>';
                    }else {
                        pro_status_update(1,$_GET['id']);
                        $_SESSION['status-success']="Đã đưa sản phẩm lên";
                        echo '<script type="text/javascript">window.history.back();</script>';
                        }
                    }
                    include "loader.php";
            break;
            case "logout":
                if(isset($_SESSION['user']) && (count($_SESSION['user']) > 0)){
                    unset($_SESSION['user']);
                    header("Location: /NLCS/index.php");
                }
            break;
            case 'productsp':
                if(isset($_GET['kw']) && $_GET['kw'] != ""){
                    $kw =  $_GET['kw'];
                }else{
                    $kw = "";
                }
                $pd_sp = getallspecifiesbyname($kw);
                include 'view/productsp.php';
                include 'view/addprosp.php';
            break;
            case 'addpdsp':
                if(isset($_POST['btn_addpdsp'])){
                    $specifies_name = $_POST['specifies_name'];
                    $value = $_POST['sp_value'];
                    $proid = $_POST['product_name'];
                    if(addpdsp($specifies_name,$value,$proid)){
                        $_SESSION['status-success']="Đã thêm thông số cho sản phẩm";
                        header("location: index.php?control=productsp");
                    }else{
                        $_SESSION['status-false']="Có lỗi";
                        header("location: index.php?control=productsp");
                    }
                    
                }
            break;
            case 'editproductsp':
                if(isset($_GET['id'])){
                    $specifies  = getspecifies($_GET['id']);
                    $product = get_All_product();
                    include "view/editproductsp.php";
                }
            break;
            case 'update-tssp':
                if(isset($_POST['btn-update-tssp'])){
                    $id = $_POST['id'];
                    $specifies_name = $_POST['specifies_name'];
                    $value =$_POST['value'];
                    $proid = $_POST['product_name'];
                    if(updatepdsp($specifies_name,$value,$proid,$id)){
                        $_SESSION['status-success']="Đã cập nhật thông số sản phẩm";
                        header("location: index.php?control=productsp");
                    }
                }
            break;
            case 'delproductsp':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    if(deletepdsp($id)>0){
                        $_SESSION['status-success']="Đã xóa";
                        header("location: index.php?control=productsp");
                    }
                }
            break;
            case 'orders':
                if( !empty($_GET['date-from']) && !empty($_GET['to-date'])){
                    $fromdate_input = $_GET['date-from'];
                    $fromdate=date("Y-m-d",strtotime($fromdate_input));
                    $todate_input =$_GET['to-date'];
                    $todate=date("Y-m-d",strtotime($todate_input));
                }else{
                    $fromdate ="";
                    $todate ="";
                }
                if(isset($_GET['paystatus'])){
                    $paystatus = $_GET['paystatus'];
                }else{
                    $paystatus ="";
                }
                if(isset($_GET['orderstatus'])){
                    $orderstatus = $_GET['orderstatus'];
                }else{
                    $orderstatus ="";
                }
                $order = get_od_from_date($fromdate , $todate, $paystatus, $orderstatus);
                $revenue = get_revenue_from_date($fromdate , $todate,$orderstatus);
                $sum = 0;
                foreach($revenue as $cost){
                    $sum += floatval($cost['total_price']);
                }
                include 'view/order.php';
                include 'view/vieworder.php';
            break;
            case 'changeodstatus':
                if((isset($_GET['id'])) && isset($_GET['status'])){
                    $id = $_GET['id'];
                    if($_GET['status'] == 0){
                        od_status_update(0,$id);
                        $_SESSION['status-false']="Đã hủy duyệt đơn";
                        echo '<script type="text/javascript">window.history.back();</script>';
                    }else {
                        od_status_update(1,$id);
                        $_SESSION['status-success']="Đã duyệt đơn hàng thành công";
                        echo '<script type="text/javascript">window.history.back();</script>';
                        }
                }
                include "loader.php";
            break;
            case 'changepaystatus':
                if((isset($_GET['id'])) && isset($_GET['paystatus'])){
                    $id = $_GET['id'];
                    if($_GET['paystatus'] == 0){
                        pay_status_update(0,$id);
                        $_SESSION['status-false']="Đã hủy thanh toán";
                        echo '<script type="text/javascript">window.history.back();</script>';
                    }else if($_GET['paystatus'] == 1) {
                        pay_status_update(1,$id);
                        $_SESSION['status-success']="Đã thanh toán đơn hàng";
                        echo '<script type="text/javascript">window.history.back();</script>';
                    }else if($_GET['paystatus'] == 3){
                        pay_status_update(3,$id);
                        $_SESSION['status-success']="Đã hoàn tiền cho đơn hàng";
                        echo '<script type="text/javascript">window.history.back();</script>';
                    }else if($_GET['paystatus'] == 2){
                        pay_status_update(2,$id);
                        $_SESSION['status-false']="Đã hủy việc hoàn tiền";
                        echo '<script type="text/javascript">window.history.back();</script>';
                    }
                }
                include "loader.php";
            break;
            case 'cancelOD':
                if(isset($_GET['id']) && $_GET['id'] != ""){
                    if($_GET['orderstatus'] == -1){ //kiểm tra đơn hàng đã được hủy chưa => nếu hủy rồi thì k hủy nữa   
                        $_SESSION['status-false']="Đơn hàng này đã được hủy!!";
                        
                    }else{ // chưa hủy thì thực hiện hủy
                        $id = $_GET['id'];
                        od_status_update(-1,$id);//cap nhap lai trang thai don hang thanh da huy 
                        $_SESSION['status-success']="Đã hủy đơn hàng thành công";
                        if($_GET['paystatus'] == 1){ //neu da thanh toan thi tien hanh hoan tien
                        pay_status_update(2,$id);
                        }else if($_GET['paystatus'] == 0) {//chua thanh toan thi doi thanh da huy
                        pay_status_update(-1,$id);
                        }
                        $pds = get_all_order_product($id);
                        if($pds){
                            foreach($pds as $pd){
                                $product = get_product_fromid($pd['proid']);
                                $n_stock = $product['stock'] + $pd['pd_quantity'];
                                stock_update($n_stock,$pd['proid']);
                            }
                        }
                    }
                    echo '<script type="text/javascript">window.history.back();</script>';
                }
                include "loader.php";
            default:
                include "home.php";
            break;
        }
    }else{
        include "home.php";
    }
    include "footer.php";
}else {
    header("Location: /NLCS/index.php");
}
?>
