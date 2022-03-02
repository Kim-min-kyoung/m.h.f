<? header('Content-Type:text/html; charset=utf-8'); ?>
<?php
    session_start();
    if(isset($_SESSION['userid'])){
    $userid =$_SESSION['userid'];
    $username=$_SESSION['username'];
    }
    else $userid="";

    $conn = mysqli_connect('localhost', 'root', '1234', 'mhf');
    $sql = "select * from product";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="etc/favicon.ico" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/main.js" defer></script>
    <title>m.h.f</title>
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
                            <p id="side_logo"><a href="index.php">m.h.f</a></p>
                            <li><a href="about/about.php">ABOUT<a></li>
                            <li><a href="product/product.php">SHOP</a></li>
                            <?php
                                if($userid !== "") {
                            ?>
                            <li><a href="cart/cart.php">CART</a></li>
                            <li><a href="qna/qna.php">Q&A</a></li>
                            <?php
                            }
                            else if($userid == "") {
                            ?>
                            <li><a onclick="event.preventDefault();alert('로그인이 필요한 서비스입니다.');" href="../cart/cart.php">CART</a></li>
                            <li><a onclick="event.preventDefault();alert('로그인이 필요한 서비스입니다.');" href="qna/qna.php">Q&A</a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </li>
                <!-- <li>
                    <a href="#"><i class="fas fa-search"></i></a>
                </li> -->
            </ul>
            <h1 class="logo">
                <a href="#">m.h.f</a>
            </h1>
            <ul id="right_menu" class="header_menu">
                <?php
                    if($userid !== "") {
                ?>
                    <li>
                        <a href="login/logout.php">LOGOUT</a>
                    </li>
                    <li>
                        <a href="cart/cart.php">CART</a>
                    </li>
                <?php
                }
                else if($userid == "") {
                ?>
                    <li>
                        <a href="login/login.php">LOGIN</a>
                    </li>
                    <li>
                        <a onclick="event.preventDefault();alert('로그인이 필요한 서비스입니다.');">
                            CART
                        </a>
                    </li>
                    <?php
                }
            ?>
            </ul>
        </div>
    </header>
    <main class="innerCon">
        <div id="main_container" class="slider">
            <div id="main_banner" class="slidebox">
                <img src="img/main_banner01.jpg">
                <img src="img/main_banner02_edit.jpg">
                <img src="img/main_banner03_edit2.jpg">
            </div>
        </div>
        <div id="main_select">
            <div class="main_menu" id="menu_01">
                <img src="img/select5.jpg">
                <div class="menu_contents">
                    <a href="product/product_lighting.php">
                        <p class="title">Lighting</p>
                        <p>조명</p>
                    </a>
                </div>
            </div>
            <div class="main_menu" id="menu_02">
                <img src="img/select7.jpg"></img>
                <div class="menu_contents">
                    <a href="product/product_furnishing.php">
                        <p class="title">Furnishing</p>
                        <p>가구</p>
                    </a>
                </div>
            </div>
            <div class="main_menu" id="menu_03">
            <img src="img/select9.jpg"></img>
                <div class="menu_contents">
                    <a href="product/product.php">
                        <p class="title">Cooking</p>
                        <p>주방용품</p>
                    </a>
                </div>
            </div>
        </div>
        <div id="main_items" class="innerCon_small">
            <div id="item_title">
                <h2>Trending Products</h2>
            </div>
            <div id="item_list">
                <div class="item_card">
                    <img class="item_img" src="img/product/light_7.jpg" alt="인기 상품 이미지" />
                </div>
                <div class="item_card">
                    <img class="item_img" src="img/product/light_8.jpg" alt="인기 상품 이미지" />
                </div>
                <div class="item_card">
                    <img class="item_img" src="img/product/light_11.jpg" alt="인기 상품 이미지" />
                </div>
                <div class="item_card">
                    <img class="item_img" src="img/product/light_5.jpg" alt="인기 상품 이미지" />
                </div>
                <div class="item_card">
                    <img class="item_img" src="img/product/cup_04.jpg" alt="인기 상품 이미지" />
                </div>
                <div class="item_card">
                    <img class="item_img" src="img/product/plate_01.jpg" alt="인기 상품 이미지" />
                </div>
                <div class="item_card">
                    <img class="item_img" src="img/product/plate_02.jpg" alt="인기 상품 이미지" />
                </div>
                <div class="item_card">
                    <img class="item_img" src="img/product/sopa_5.jpg" alt="인기 상품 이미지" />
                </div>
                <div class="item_card">
                    <img class="item_img" src="img/product/sopa_2.jpg" alt="인기 상품 이미지" />
                </div>
                <div class="item_card">
                    <img class="item_img" src="img/product/table_1.jpg" alt="인기 상품 이미지" />
                </div>
            </div>
        </div>
    </main>
<?php include_once 'include/footer.php' ?>   