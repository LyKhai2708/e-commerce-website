<?php 
    require_once 'connectdb.php';
    function check_cart($userid){
        try{
            $sql = "SELECT * from cart where userid = ".$userid;
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
            } catch( Exception $e) {
               die($e->getMessage());
            }finally {
                $conn->close();
            }
    }
    function addcart($userid, $productid, $quantity){
        $sql = "INSERT INTO cart(userid, productid, quantity) VALUES (? ,?, ?)";
        try{
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('iii',$userid, $productid, $quantity);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
            die($e->getMessage());
         }finally {
            $conn->close();
         }
    }
    function detele_product_cart($userid){
        try{
            $sql ="DELETE from cart where userid = ?";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('i',$userid);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function detele_product_cart_user($userid,$productid){
        try{
            $sql ="DELETE from cart where userid = ? AND productid= ?";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('ii',$userid,$productid);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function check_duplicate_db($userid,$productid){
        try{
            $sql ="SELECT * from cart where userid = ".$userid." AND productid= ".$productid;
            $conn = connectdb();
            $result= $conn->query($sql);
            return $result->num_rows;
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function updatequantity($userid, $productid, $quantity){
        $sql = "UPDATE cart SET quantity=? where userid=? AND productid=?";
        try{
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('iii',$quantity, $userid, $productid);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
            die($e->getMessage());
         }finally {
            $conn->close();
        }
    }
    function quantityplus($userid, $productid){
        $sql = "UPDATE cart SET quantity=quantity+1 where userid=? AND productid=?";
        try{
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('ii',$userid, $productid);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
            die($e->getMessage());
         }finally {
            $conn->close();
        }
    }
    function quantityminus($userid, $productid){
        $sql = "UPDATE cart SET quantity=quantity-1 where userid=? AND productid=?";
        try{
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('ii',$userid, $productid);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
            die($e->getMessage());
         }finally {
            $conn->close();
        }
    }
    //các hàm xử lý trong session 
    function check_duplicate($idpro){
        for($i = 0; $i < sizeof($_SESSION['cart']); $i++){
            if($_SESSION['cart'][$i]['id'] == $idpro){
                return $i;
            }
        }
        return -1;
    }
    function update_cart($pos,$quantity){
        for($i = 0; $i < sizeof($_SESSION['cart']); $i++){
            if($i == $pos){
                $_SESSION['cart'][$i]['quantity']+= $quantity;
            }
        }
    }
    function update_plus1_cart($pos){
        for($i = 0; $i < sizeof($_SESSION['cart']); $i++){
            if($i == $pos){
                $_SESSION['cart'][$i]['quantity']+= 1;
            }
        }
    }
    function update_minus1_cart($pos){
        for($i = 0; $i < sizeof($_SESSION['cart']); $i++){
            if($i == $pos){
                $_SESSION['cart'][$i]['quantity']-= 1;
            }
        }
    }
?>