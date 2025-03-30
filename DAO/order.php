<?php
function add_order($id, $total_price, $note, $pay_by, $address, $cus_phone, $cus_name, $userid,$cus_email){
    $sql = "INSERT INTO orders(id, total_price, note, Pay_by, address, cus_phone, cus_name, userid, cus_email)
     VALUES ('$id', $total_price, '$note', '$pay_by', '$address', '$cus_phone', '$cus_name', $userid, '$cus_email')";
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
function add_order_none_user($id, $total_price, $note, $pay_by, $address, $cus_phone, $cus_name,$cus_email){
    $sql = "INSERT INTO orders(id, total_price, note, Pay_by, address, cus_phone, cus_name, cus_email) 
    VALUES ('$id', $total_price, '$note', '$pay_by', '$address', '$cus_phone', '$cus_name', '$cus_email')";
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

function add_order_product($pd_quantity, $cost_now, $total_price, $orderid, $proid){
    $sql= "INSERT INTO orders_detail(pd_quantity, cost_now, total_price, orderid, proid) VALUES ($pd_quantity, $cost_now, $total_price,'$orderid', $proid)";
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
function get_All_order($id) {
    try{
        $sql = "SELECT * from orders where userid =".$id;
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}

function get_quantity_order_product($id) {
    try{
        $sql = "SELECT * from orders o join orders_detail od on o.id = od.orderid  where o.id = ?";
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$id);
        $stm->execute();
        $result = $stm->get_result();
        $quantity = 0;
        while($row = $result->fetch_assoc()){
            $quantity += $row['pd_quantity'];
        }
        return $quantity;
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function get_all_order_product($id) {
    try{
        $sql = "SELECT od.proid, od.pd_quantity, od.cost_now , od.total_price from orders_detail od left join orders  o on od.orderid = o.id  where od.orderid = ?";
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$id);
        $stm->execute();
        $result = $stm->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function get_order_by_id($id){
    try{
        $sql = "SELECT * from orders where id = ?";
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$id);
        $stm->execute();
        $result = $stm->get_result();
        return $result->fetch_assoc();
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function count_order(){
    try{
        $sql = "SELECT * from orders";
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
function get_allod() {
    try{
        $sql = "SELECT * from orders";
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function get_od_from_date($fromdate , $todate, $paystatus, $orderstatus){
    try{
        $sql = "SELECT * from orders where 1";
        if($fromdate != "" &&  $todate!=""){
            $sql .= " AND order_date BETWEEN '"."$fromdate"."' AND '"."$todate"."'";
        }
        if($paystatus != ""){
            $sql .= " AND pay_status = $paystatus";
        }
        if($orderstatus != ""){
            $sql .= " AND order_status = $orderstatus";
        }
        $sql .=" ORDER BY order_date DESC";
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function get_revenue_from_date($fromdate , $todate,$orderstatus){
    try{
        $sql = "SELECT * from orders where 1";
        if($fromdate != "" &&  $todate!=""){
            $sql .= " AND order_date BETWEEN '"."$fromdate"."' AND '"."$todate"."'";
        }
        if($orderstatus != ""){
            $sql .= " AND order_status = $orderstatus";
        }
        $sql .=" AND pay_status=1 ORDER BY id DESC ";
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function od_status_update($value, $odid){
    $sql = "UPDATE orders SET order_status=? where id=?";
    try{
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('is',$value, $odid);
        $result = $stm->execute();
        return $result;
    } catch( Exception $e) {
        die($e->getMessage());
     }finally {
        $conn->close();
    }
}
function pay_status_update($value, $odid){
    $sql = "UPDATE orders SET pay_status=? where id=?";
    try{
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('is',$value, $odid);
        $result = $stm->execute();
        return $result;
    } catch( Exception $e) {
        die($e->getMessage());
     }finally {
        $conn->close();
    }
}
function avenue_month(){
    $sql = "SELECT total_price FROM orders WHERE MONTH(order_date) = MONTH(CURDATE()) AND YEAR(order_date) = YEAR(CURDATE()) AND pay_status = 1";
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
?>