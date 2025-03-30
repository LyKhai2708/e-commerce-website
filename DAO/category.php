<?php 
    require_once 'connectdb.php';
    function get_all_cat(){ 
        try{
            $sql = "SELECT * from category";
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch( Exception $e) {
           die($e->getMessage());
        }finally {
            $conn->close();
        }
    }
    function get_cat_hot() {
        try{
            $sql = "SELECT * FROM category where home = 1";
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
            } catch( Exception $e) {
               die($e->getMessage());
            }finally {
                $conn->close();
                
        }
    }
    function get_cat_from_id($id){
        try{
            $sql = "SELECT * from category where id = ?";
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
            return $result;
    }
    function get_name_cat($id) {
        try{
            $sql = "SELECT category_name from category where id = ?";
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('i',$id);
            $stm->execute();
            $result = $stm->get_result();
            return $result->fetch_array()[0];
        }catch( Exception $e) {
            die($e->getMessage());
         }finally {
             $conn->close();
         }
    }
    function get_cat_from_pid($id){
        try{
            $sql = "SELECT c.id, c.category_name from category c JOIN product p on c.id = p.categoryid where p.id =".$id;
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        }catch( Exception $e) {
            die($e->getMessage());
         }finally {
             $conn->close();
         }
    }
    function detele_category($id){
        try{
            $sql ="DELETE from category where id = ?";
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
    function check_empty_cat($id){
        try{
            $sql = "SELECT * from product p JOIN category c on p.categoryid = c.id where c.id =".$id;
            $conn = connectdb();
            $result = $conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        }catch( Exception $e) {
            die($e->getMessage());
         }finally {
             $conn->close();
         }
    }
    function home_update($value, $catid){
        $sql = "UPDATE category SET home=? where id=?";
        try{
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('ii',$value, $catid);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
            die($e->getMessage());
         }finally {
            $conn->close();
        }
    }
    function add_cat($category_name){
        $sql = "INSERT INTO category(category_name) VALUES (?)";
        try{
            $conn = connectdb();
            $stm = $conn->prepare($sql);
            $stm->bind_param('s',$category_name);
            $result = $stm->execute();
            return $result;
        } catch( Exception $e) {
            die($e->getMessage());
         }finally {
            $conn->close();
         }
    }
?>