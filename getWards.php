<?php 
include 'DAO/location.php';
if($_GET['id']){
    $wards = get_wards_districtid($_GET['id']);
    foreach($wards as $row){
?>
    <option value="<?php echo $row['wards_id'] ?>"><?php echo $row['name'] ?></option>
<?php 
    }
}

?>