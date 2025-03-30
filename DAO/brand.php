<?php 
    require_once 'connectdb.php';
function getBrandname($id){
    try{
        $sql = "SELECT brand_name from brand where id = ?";
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id);
        $stm->execute();
        $result = $stm->get_result();
        return $result->fetch_array()[0];
    } catch( Exception $e) {
        die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function checkbrandname($brandname){
    try{
        $sql = "SELECT * from brand where brand_name = ?";
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$brandname);
        $stm->execute();
        $result = $stm->get_result();
        return $result->fetch_assoc();
    } catch( Exception $e) {
        die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function get_product_brand($id){
    try{
        $sql = "SELECT * from product where brandid = ?";
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id);
        $stm->execute();
        $result = $stm->get_result();
        $result->fetch_all(MYSQLI_ASSOC);
        $num = $result->num_rows;
        return $num;
    } catch( Exception $e) {
        die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function getallbrand(){
    try{
        $sql = "SELECT * from brand";
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch( Exception $e) {
        die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function detele_brand($id){
    try{
        $sql ="DELETE from brand where id = ?";
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('i',$id);
        $result = $stm->execute();
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
    return $result;
}
function addbrand($brandname){
    $sql = "INSERT INTO brand(brand_name) VALUES (?)";
        try{
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('s',$brandname);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
            die($e->getMessage());
         }finally {
            $conn->close();
         }
}
?>