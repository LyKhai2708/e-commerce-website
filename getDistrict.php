<?php 
include 'DAO/location.php';
if($_GET['id']){
        $districts = get_district_cityid($_GET['id']);
        foreach($districts as $row){
?>
    <option value="<?php echo $row['district_id'] ?>"><?php echo $row['name'] ?></option>
<?php 
        }
}

?>