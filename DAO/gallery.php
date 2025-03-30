<?php 
    require_once('connectdb.php');
    function uploadfile($filename,$tmpname){
            $target_dir = "upload/";
            $target_file = "../".$target_dir .basename($filename);
            move_uploaded_file($tmpname, $target_file); 
    }
    function deloldfile($oldfile){
        if(file_exists($oldfile)){
            unlink($oldfile);
            echo 1;
        }
    }
    function insertGallery($img_path,$productid){
        $sql = "INSERT INTO product_gallery(img_path,productid) VALUES ('$img_path',$productid)";
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
    function get_path_gallery($id){
        try{
            $sql = "SELECT img_path FROM product_gallery where productid=?";
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