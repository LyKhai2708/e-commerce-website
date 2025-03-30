<?php

function connectdb () {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "nlcs";
    $conn = new mysqli($servername,$username,$password,$database);
    if ($conn->connect_error){
        die("Connection false: ". $conn->connect_error);
    }
    return $conn;
}

// function execute_sql($sql) {
//     $sql_args = array_slice(func_get_args(), 1);
//     try{
//     $conn = connectdb();
//     $stm = $conn->prepare($sql);
//     $stm->execute($sql_args);
//     }
//     catch(PDOException $e){
//         throw $e;
//     }
//     finally{
//         $conn = null;
//     }
// }
// function sql_query($sql) {
//     $sql_args = array_slice(func_get_args(), 1);
//     try{
//         $conn = connectdb();
//         $stm = $conn->prepare($sql);
//         $stm->execute($sql_args);
//         $stm->setFetchMode(PDO::FETCH_ASSOC);
//         $rs = $stm->fetchAll();
//         return $rs;
//     }
//     catch(PDOException $e){
//         throw $e;
//     }
//     finally{
//         $conn = null;
//     }
// }

// function sql_query_one($sql){
//     $sql_args = array_slice(func_get_args(), 1);
//     try{
//         $conn = connectdb();
//         $stm = $conn->prepare($sql);
//         $stm->execute($sql_args);
//         $rs = $stm->fetch(PDO::FETCH_ASSOC);
//         return $rs;
//     }catch(PDOException $e){
//         throw $e;
//     }
//     finally{
//         $conn = null;
//     }
// }
?>