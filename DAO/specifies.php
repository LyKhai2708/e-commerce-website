<?php 
    require_once 'connectdb.php';
    // function get_product_specifies() {
    //     $sql = "SELECT pst.specifies_type_name,ps.value from product p JOIN product_specifies ps on p.id = ps.productid JOIN product_specifies_type pst on ps.specifiesid = pst.id where p.id = ?";
    //     try{
    //         $sql = "SELECT brand_name from brand where id = ?";
    //         $conn = connectdb();
    //         $stm = $conn->prepare($sql);
    //         $stm->bind_param('i',$id);
    //         $stm->execute();
    //         $result = $stm->get_result();
    //         return $result->fetch_array()[0];
    //     } catch( Exception $e) {
    //         die($e->getMessage());
    //     }finally {
    //         $conn->close();
    //     }
    // }
    function getallspecifies() {
        try{
            $sql = "SELECT * from product_specifies";
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function addpdsp($specifies_name,$value,$productid){
        $sql = "INSERT INTO product_specifies(specifies_name,value,proid) VALUES ('$specifies_name','$value',$productid)";
        try{
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result;
        }catch( Exception $e) {
            die($e->getMessage());
         }finally {
            $conn->close();
        }
    }
    function getallspecifies_product($id) {
        try{
            $sql = "SELECT * from product_specifies where proid=".$id;
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function getspecifies($id) {
        try{
            $sql = "SELECT * from product_specifies where id=".$id;
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_assoc();
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function updatepdsp($specifies_name,$value,$proid,$id){
        $sql = "UPDATE product_specifies SET specifies_name ='$specifies_name' ,value= '$value' ,proid= $proid WHERE id= $id";
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
    function deletepdsp($id){
        $sql = "DELETE from product_specifies where id=".$id;
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
    function getallspecifiesbyname($kw) {
        try{
            $sql = "SELECT ps.*, pd.product_name from product_specifies ps join product pd on ps.proid = pd.id  where 1";
            if($kw != " "){
                $sql .= " AND pd.product_name LIKE '%$kw%'";
            }
            $sql .=" ORDER BY ps.id DESC";
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
?>