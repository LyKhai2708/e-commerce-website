<?php 
require_once "connectdb.php";
function updateuser($username, $email, $password, $phone,$gender,$birth ,$id){
    $sql = "UPDATE users SET user_name=?, email=?, password=?, phone=?,gender=?,birth=? where id=?";
    try{
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssssi',$username, $email, $password, $phone,$gender,$birth ,$id);
        $result = $stm->execute();
        return $result;
    } catch( Exception $e) {
        die($e->getMessage());
     }finally {
        $conn->close();
    }
}
function updatepass($password,$id){
    $sql = "UPDATE users SET password=? where id= ?";
    try{
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('si',$password,$id);
        $result = $stm->execute();
        return $result;
    } catch( Exception $e) {
        die($e->getMessage());
     }finally {
        $conn->close();
    }
}
function adduser($username, $email, $password, $phone){
    $sql = "INSERT INTO users(user_name, email, password, phone) VALUES (? ,?, ?, ?)";
    try{
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssss',$username, $email, $password, $phone);
        $result = $stm->execute();
        return $result;
    } catch( Exception $e) {
        die($e->getMessage());
     }finally {
        $conn->close();
     }
}
function checkemail($useremail){
    $sql = "SELECT * from users where email = ?";
    try{
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$useremail);
        $stm->execute();
        $result = $stm->get_result();
        $n = $result->fetch_all(MYSQLI_ASSOC);
        if(count($n)>0) return true;
        else return false;
    } catch( Exception $e) {
        die($e->getMessage());
     }finally {
         $conn->close();
     }
}
function checkuser($useremail, $password){
    $sql = "SELECT * from users where email = ? and password = ? ";
    try{
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$useremail,$password);
        $stm->execute();
        $result = $stm->get_result();
        $n = $result->fetch_all(MYSQLI_ASSOC);
        if(count($n)>0) return $n[0]['roleid'];
        else return 0;
    } catch( Exception $e) {
        die($e->getMessage());
     }finally {
         $conn->close();
     }
}
function getuser($useremail, $password){
    $sql = "SELECT * from users where email = ? and password = ?";
    try{
        $conn = connectdb();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$useremail,$password);
        $stm->execute();
        $result = $stm->get_result();
        return $result->fetch_assoc();
    } catch( Exception $e) {
        die($e->getMessage());
     }finally {
         $conn->close();
     }
}
function getuserbyid($id){
    $sql = "SELECT * from users where id=".$id;
    try{
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    } catch( Exception $e) {
        die($e->getMessage());
     }finally {
         $conn->close();
     }
}
function getallcus(){
    $sql = "SELECT * from users where roleid=2";
    try{
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch( Exception $e) {
        die($e->getMessage());
     }finally {
         $conn->close();
     }
}
function count_user(){
    try{
        $sql = "SELECT * from users where roleid=2";
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
?>