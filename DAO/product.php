<?php
    require_once 'connectdb.php';

    function get_product_fromid($id) {
        try{
        $sql = "SELECT * from product where id = ?";
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id);
        $stm->execute();
        $result = $stm->get_result();
        return $result->fetch_assoc();
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function get_All() {
        try{
            $sql = "SELECT * from product where product_status=1 AND stock >=1";
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function get_All_product() {
        try{
            $sql = "SELECT * from product";
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function get_all_product_($catid,$kw){
        try{
            $sql = "SELECT * from product where 1";
            if($catid>0){
                $sql .=" AND categoryid=".$catid;
            }
            if($kw != ""){
                $sql .=" AND product_name LIKE '%".$kw."%'";
            }
            $sql .= " order by id DESC";
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function get_All_product_page($cur_page,$catid,$kw){
        try{
            $pos = ($cur_page - 1)*NUMBER_RECORD;
            $sql = "SELECT * from product where 1";
            if($catid>0){
                $sql .=" AND categoryid=".$catid;
            }
            if($kw != ""){
                $sql .=" AND product_name LIKE '%".$kw."%'";
            }
            $sql .= " order by id DESC LIMIT $pos,".NUMBER_RECORD;
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function get_collection($id,$by,$order) {
        try{
            $sql = "SELECT * FROM product  WHERE 1 AND stock >=1 AND product_status=1";
            if($id > 0){
                $sql .=" AND categoryid=".$id;
            }
            $sql .= " ORDER BY ".$by." ".$order;
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
            } catch( Exception $e) {
               die($e->getMessage());
            }finally {
                $conn->close();
            }
    }
    function detele_product($id){
        try{
            $sql ="DELETE from product where id = ?";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('i',$id);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function search_product($word,$by,$orderby){
        try{
            $word = trim($word);
            $sql = "SELECT * FROM product where product_name LIKE '%".$word."%' AND stock >= 1 AND product_status=1 ORDER BY ".$by." ".$orderby."";
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
            } catch( Exception $e) {
               die($e->getMessage());
            }finally {
                $conn->close();
            }
        
    }
    function get_product_fromcat($idcat){
        try{
            $sql = "SELECT * FROM product where categoryid=? AND stock >=1 AND product_status=1";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('i',$idcat);
            $stm->execute();
            $result = $stm->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
            } catch( Exception $e) {
               die($e->getMessage());
            }finally {
                $conn->close();
            }
    }
    function get_product_relate($idcat,$id){
        try{
            $sql = "SELECT * FROM product where categoryid=? AND id<>? AND stock >=1 AND product_status=1 ORDER BY RAND() LIMIT 5 ";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('ii',$idcat,$id);
            $stm->execute();
            $result = $stm->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
            } catch( Exception $e) {
               die($e->getMessage());
            }finally {
                $conn->close();
            }
    }
    function get_product_hot_fromcat($idcat){
        try{
            $sql = "SELECT * FROM product where categoryid=? and pd.hot = 1 AND stock >=1 ORDER BY pd.id ASC LIMIT 0,5";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('i',$idcat);
            $stm->execute();
            $result = $stm->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
            } catch( Exception $e) {
               die($e->getMessage());
            }finally {
                $conn->close();
            }
    }
    function get_new_product($idcat){
        try{
            $sql = "SELECT * FROM product where categoryid=?  AND stock >=1 AND product_status=1 ORDER BY id DESC LIMIT 5";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('i',$idcat);
            $stm->execute();
            $result = $stm->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
            } catch( Exception $e) {
               die($e->getMessage());
            }finally {
                $conn->close();
            }
    }
    function format_money($amount){
            return number_format($amount, 0, '.', '.'). ''. '₫';
    }
    function get_Gallery($id){
        try{
            $sql = "SELECT img_path FROM product_gallery g JOIN product p on g.productid = p.id where p.id=? LIMIT 5";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('i',$id);
            $stm->execute();
            $result = $stm->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);;
            } catch( Exception $e) {
               die($e->getMessage());
            }finally {
                $conn->close();
        }
    }
    function del_cart($id){
        try{
            $sql ="DELETE from cart where productid = ?";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('i',$id);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function del_gallery($id){
        try{
            $sql ="DELETE from product_gallery where productid = ?";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('i',$id);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function del_prosp($id){
        try{
            $sql ="DELETE from product_specifies where proid = ?";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('i',$id);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function del_orderdetail($id){
        try{
            $sql ="DELETE from orders_detail where proid = ?";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('i',$id);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function stock_update($stock, $productid){
        $sql = "UPDATE product SET stock=? where id=?";
        try{
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('ii',$stock, $productid);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
            die($e->getMessage());
         }finally {
            $conn->close();
        }
    }
    
    // function check_dupindatabase($idpro){
    //     try{
    //         $sql = "SELECT * FROM cart where productid=".$idpro;
    //         $conn = connectdb();
    //         $result = $conn->prepare($sql);
    //         return $result->num_rows;
    //         } catch( Exception $e) {
    //            die($e->getMessage());
    //         }finally {
    //             $conn->close();
    //     }
    // }
    function get_product_specifies($id) {
        try{
            $sql = "SELECT * FROM product_specifies ps join product p  on ps.proid =p.id where ps.proid =".$id;
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function countProduct(){
        try{
            $sql = "SELECT * from product";
            $conn = connectdb();
            $result = $conn->query($sql);
            $result->fetch_all(MYSQLI_ASSOC);
            $n = $result->num_rows;
            return $n;
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function pro_status_update($value, $proid){
        $sql = "UPDATE product SET product_status=? where id=?";
        try{
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('ii',$value, $proid);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
            die($e->getMessage());
         }finally {
            $conn->close();
        }
    }
    function addproduct($product_name, $categoryid, $avt, $product_des, $price_now, $price_discount, $warranty, $brandid, $stock){
        $sql = "INSERT INTO product(product_name, categoryid, avt, product_des, price_now, price_discount, warranty, brandid, stock) VALUES ('$product_name', $categoryid, '$avt', '$product_des', $price_now, $price_discount, $warranty, $brandid, $stock)";
        try{
            $conn = connectdb();
            $conn->query($sql);
            return $conn->insert_id;
        }catch( Exception $e) {
            die($e->getMessage());
         }finally {
            $conn->close();
        }
    }
    function updateproduct($product_name, $categoryid, $avt, $product_des, $price_now, $price_discount, $warranty, $brandid, $stock,$id){
        if($avt == ""){
            $sql = "UPDATE product SET product_name ='$product_name' ,categoryid= $categoryid ,product_des= '$product_des',price_now=$price_now,price_discount=$price_discount,warranty=$warranty,brandid=$brandid,stock=$stock WHERE id= $id";
        }else {
        $sql = "UPDATE product SET product_name ='$product_name' ,categoryid= $categoryid ,avt= '$avt',product_des= '$product_des',price_now=$price_now,price_discount=$price_discount,warranty=$warranty,brandid=$brandid,stock=$stock WHERE id= $id";
        }
        try{
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result;
        } catch( Exception $e) {
            die($e->getMessage());
         }finally {
            $conn->close();
        }
    }
    function paginate($numberrecord,$cur_page,$catid,$kw){
        if($catid > 0 || $kw != ""){
            $total = count(get_all_product_($catid,$kw));
        }else {
            $total = countProduct();
        }
        $numpage= ceil($total/$numberrecord);
        $html_paginate="";
            if($catid > 0){
                if($cur_page - 1 > 0){
                    $html_paginate .= '<a href="index.php?control=product&page='.($cur_page - 1).'&catid='.$catid.'"><i class="fa-solid fa-chevron-left"></i></a>';
                    }
                    for($i=1;$i<=$numpage;$i++){ 
                        if($i  == $cur_page ){
                        $html_paginate .= '<a class="active" href="index.php?control=product&page='.$i.'&catid='.$catid.'">'.$i.'</a>';
                        }else $html_paginate .= '<a class="" href="index.php?control=product&page='.$i.'&catid='.$catid.'">'.$i.'</a>';
        
                    } 
                    if($cur_page + 1 <= $numpage){
                        $html_paginate .='<a href="index.php?control=product&page='.($cur_page + 1).'&catid='.$catid.'"><i class="fa-solid fa-chevron-right"></i></a>';
                    }
            }else if($kw != ""){
                    if($cur_page - 1 > 0){
                    $html_paginate .= '<a href="index.php?control=product&page='.($cur_page - 1).'&kw='.$kw.'"><i class="fa-solid fa-chevron-left"></i></a>';
                    }
                    for($i=1;$i<=$numpage;$i++){ 
                        if($i  == $cur_page ){
                        $html_paginate .= '<a class="active" href="index.php?control=product&page='.$i.'&kw='.$kw.'">'.$i.'</a>';
                        }else $html_paginate .= '<a class="" href="index.php?control=product&page='.$i.'&kw='.$kw.'">'.$i.'</a>';
        
                    } 
                    if($cur_page + 1 <= $numpage){
                        $html_paginate .='<a href="index.php?control=product&page='.($cur_page + 1).'&kw='.$kw.'"><i class="fa-solid fa-chevron-right"></i></a>';
                    }
            }else if($catid > 0 && $kw != ""){
                if($cur_page - 1 > 0){
                    $html_paginate .= '<a href="index.php?control=product&page='.($cur_page - 1).'&catid='.$catid.'&kw='.$kw.'"><i class="fa-solid fa-chevron-left"></i></a>';
                    }
                    for($i=1;$i<=$numpage;$i++){ 
                        if($i  == $cur_page ){
                        $html_paginate .= '<a class="active" href="index.php?control=product&page='.$i.'&catid='.$catid.'&kw='.$kw.'">'.$i.'</a>';
                        }else $html_paginate .= '<a class="" href="index.php?control=product&page='.$i.'&catid='.$catid.'&kw='.$kw.'">'.$i.'</a>';
        
                    } 
                    if($cur_page + 1 <= $numpage){
                        $html_paginate .='<a href="index.php?control=product&page='.($cur_page + 1).'&catid='.$catid.'&kw='.$kw.'"><i class="fa-solid fa-chevron-right"></i></a>';
                    }
            }else{
            if($cur_page - 1 > 0){
            $html_paginate .= '<a href="index.php?control=product&page='.($cur_page - 1).'"><i class="fa-solid fa-chevron-left"></i></a>';
            }
            for($i=1;$i<=$numpage;$i++){ 
                if($i  == $cur_page ){
                $html_paginate .= '<a class="active" href="index.php?control=product&page='.$i.'">'.$i.'</a>';
                }else $html_paginate .= '<a class="" href="index.php?control=product&page='.$i.'">'.$i.'</a>';

            } 
            if($cur_page + 1 <= $numpage){
                $html_paginate .='<a href="index.php?control=product&page='.($cur_page + 1).'"><i class="fa-solid fa-chevron-right"></i></a>';
            }
        }
        return $html_paginate;   
    }
?>