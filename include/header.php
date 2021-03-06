<?php
     session_start();
     if(isset($_SESSION['userid'])){
         $userid =$_SESSION['userid'];
         $username=$_SESSION['username'];
     }
     else $userid="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../etc/favicon.ico" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/product.css?after">
    <link rel="stylesheet" href="../css/login.css?after">
    <link rel="stylesheet" href="../css/join.css">
    <link rel="stylesheet" href="../css/about.css">
    <link rel="stylesheet" href="../css/qna.css?after">
    <link rel="stylesheet" href="../css/cart.css">
    <script src="../js/main.js" defer></script>
    <title>m.h.f | product</title>
</head>
<body>
    <header>
        <div id="header_container" class="innerCon">
            <ul id="left_menu" class="header_menu">
                <li>
                    <a href="#"><i class="fas fa-bars openMenu"></i></a>
                    <div class="blackbg">
                        <ul class="side_menu">
                            <span><i class="fas fa-times" id="closeIcon"></i></span>
                            <p id="side_logo"><a href="../index.php">m.h.f</a></p>
                            <li><a href="../about/about.php">ABOUT<a></li>
                            <li><a href="../product/product.php">SHOP</a></li>
                            <?php
                                if($userid !== "") {
                            ?>
                            <li><a href="../cart/cart.php">CART</a></li>
                            <li><a href="../qna/qna.php">Q&A</a></li>
                            <?php
                            }
                            else if($userid == "") {
                            ?>
                            <li><a onclick="event.preventDefault();alert('???????????? ????????? ??????????????????.');" href="../cart/cart.php">CART</a></li>
                            <li><a onclick="event.preventDefault();alert('???????????? ????????? ??????????????????.');" href="../qna/qna.php">Q&A</a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </li>
            </ul>
            <h1 class="logo">
                <a href="../index.php">m.h.f</a>
            </h1>
            <ul id="right_menu" class="header_menu">
                <?php
                    if($userid !== "") {
                ?>
                    <li>
                        <a href="../login/logout.php">LOGOUT</a>
                    </li>
                    <li>
                        <a href="../cart/cart.php">CART</a>
                    </li>
                <?php
                }
                else if($userid == "") {
                ?>
                    <li>
                        <a href="../login/login.php">LOGIN</a>
                    </li>
                    <li>
                        <a onclick="event.preventDefault();alert('???????????? ????????? ??????????????????.');">
                            CART
                        </a>
                    </li>
                    <?php
                    }
                ?>
            </ul>
        </div>
    </header>