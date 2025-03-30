<?php

require_once 'connectdb.php';

function get_city() {
    try{
        $sql = "SELECT * from province";
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}

function get_district_cityid($id) {
    try{
        $sql = "SELECT * from district where province_id =".$id;
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function get_wards_districtid($id) {
    try{
        $sql = "SELECT * from wards where district_id =".$id;
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function get_city_name($id) {
    try{
        $sql = "SELECT name from province where province_id=".$id;
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function get_district_name($id) {
    try{
        $sql = "SELECT name from district where district_id=".$id;
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}
function get_ward_name($id) {
    try{
        $sql = "SELECT name from wards where wards_id=".$id;
        $conn = connectdb();
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    } catch( Exception $e) {
       die($e->getMessage());
    }finally {
        $conn->close();
    }
}