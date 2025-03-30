<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="index.css?v=<?php echo time();?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/af6fee153e.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="nav_wrapper">
                <div class="logo"><img src="/NLCS/image/logot.png" alt="" srcset=""></div>
                <div class="logout">
                    <i class="fa-regular fa-user"></i> 
                    <span>Xin chào Admin</span>
                    <a href="index.php?control=logout">Đăng Xuất</a>
                </div>
            </div>
    </header>
<?php
    
    if(isset($_SESSION['status-false'])) {
    ?>
    <div class="alert alert-danger">
        <i class="fa-solid fa-triangle-exclamation"></i><span><?php echo $_SESSION['status-false']  ?></span>
    </div>
    <?php unset($_SESSION['status-false']);}else if(isset($_SESSION['status-success'])){ ?>
        <div class="alert alert-success">
            <i class="fa-solid fa-circle-check"></i><span><?php echo $_SESSION['status-success']  ?></span>
        </div>   
    <?php unset($_SESSION['status-success']);}?>