<?php
    $conn = mysqli_connect('localhost', 'root', '1234', 'mhf');
    $sqlstr = "select * from product order by prd_group asc";
    $result = mysqli_query($conn, $sqlstr);
    function showlist(){
        global $result;
        while($row = mysqli_fetch_array($result)){
            echo "<div class=\"product-card\">";
            echo "<a href='product_view.php?no={$row['prd_id']}'><div class=\"product-img\"><img src=\"{$row['prd_photo']}\"></div>";
            echo "<div class=\"product-contents\">";
            echo "<p class=\"product_name\">{$row['prd_name']}</a></p>";
            echo "<p class=\"product_price\">￦";
            echo number_format($row['prd_price']);
            echo "</p>";
            echo "</div>";
            echo "</div>";
        }
    }

    $sqlstr2 = "select * from product where prd_group = 'lighting' order by prd_name asc";
    $result2 = mysqli_query($conn, $sqlstr2);
    function showlist2(){
        global $result2;
        while($row2 = mysqli_fetch_array($result2)){
            echo "<div class=\"product-card\">";
            echo "<a href='product_view.php?no={$row2['prd_id']}'><div class=\"product-img\"><img src=\"{$row2['prd_photo']}\"></div>";
            echo "<div class=\"product-contents\">";
            echo "<p class=\"product_name\">{$row2['prd_name']}</a></p>";
            echo "<p class=\"product_price\">￦";
            echo number_format($row2['prd_price']);
            echo "</p>";
            echo "</div>";
            echo "</div>";
        }
    }
    $sqlstr3 = "select * from product where prd_group = 'FURGINISHING' order by prd_name asc";
    $result3 = mysqli_query($conn, $sqlstr3);
    function showlist3(){
        global $result3;
        while($row3 = mysqli_fetch_array($result3)){
            echo "<div class=\"product-card\">";
            echo "<a href='product_view.php?no={$row3['prd_id']}'><div class=\"product-img\"><img src=\"{$row3['prd_photo']}\"></div>";
            echo "<div class=\"product-contents\">";
            echo "<p class=\"product_name\">{$row3['prd_name']}</a></p>";
            echo "<p class=\"product_price\">￦";
            echo number_format($row3['prd_price']);
            echo "</p>";
            echo "</div>";
            echo "</div>";
        }
    }
    $sqlstr4 = "select * from product where prd_group = 'FURGINISHING' order by prd_name asc";
    $result3 = mysqli_query($conn, $sqlstr4);
    function showlist4(){
        global $result4;
        while($row4 = mysqli_fetch_array($result4)){
            echo "<div class=\"product-card\">";
            echo "<a href='product_view.php?no={$row4['prd_id']}'><div class=\"product-img\"><img src=\"{$row4['prd_photo']}\"></div>";
            echo "<div class=\"product-contents\">";
            echo "<p class=\"product_name\">{$row4['prd_name']}</a></p>";
            echo "<p class=\"product_price\">￦";
            echo number_format($row4['prd_price']);
            echo "</p>";
            echo "</div>";
            echo "</div>";
        }
    }
?>
<script src="../js/product.js" defer></script>
<?php include_once '../include/header.php' ?>
    <main>
        <div id="product_inner" class="innerCon_small">
            <div id="product_top">
                <div id="left_top">
                    <h1>PRODUCT</h1>
                    <span><i class="fas fa-chevron-right"></i></span>
                    <ul>
                        <li class="liBtn">LIGHTING</li>
                        <li>FURGINISHING</li>
                        <li>COOKING</li>
                    </ul>
                </div>
                <div id="right_top">
                    <ul>
                        <li>name</li>
                        <li>new</li>
                        <li>price</li>
                    </ul>
                </div>
            </div>
            <div id="product">
                <div id="product-list">
                    <?php showlist(); ?>
                    <!-- <div class="product-card">
                        <div>
                            <img class="product-img" src="../img/product/lighting_2.jpeg" alt="레시피 이미지" />
                        </div>
                        <div class="product-contents">
                            <p class="product_name">LED 아로스 조명</p>
                            <p class="product_price">￦55,000</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <div>
                            <img class="product-img" src="../img/product/lighting_3.jpeg" alt="레시피 이미지" />
                        </div>
                        <div class="product-contents">
                            <p class="product_name">코니아 7등 인테리어 조명</p>
                            <p class="product_price">￦55,000</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <div>
                            <img class="product-img" src="../img/product/lighting_4.jpeg" alt="레시피 이미지" />
                        </div>
                        <div class="product-contents">
                            <p class="product_name">프링 6등 인테리어 조명 파이프 형식</p>
                            <p class="product_price">￦55,000</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <div>
                            <img class="product-img" src="../img/product/lighting_5.jpeg" alt="레시피 이미지" />
                        </div>
                        <div class="product-contents">
                            <p class="product_name">모엠 4등 방등 조명</p>
                            <p class="product_price">￦55,000</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <div>
                            <img class="product-img" src="../img/product/lighting_6.jpeg" alt="레시피 이미지" />
                        </div>
                        <div class="product-contents">
                            <p class="product_name">LED 아로스 조명</p>
                            <p class="product_price">￦55,000</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <div>
                            <img class="product-img" src="../img/product/lighting_7.jpeg" alt="레시피 이미지" />
                        </div>
                        <div class="product-contents">
                            <p class="product_name">코니아 7등 인테리어 조명</p>
                            <p class="product_price">￦55,000</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <div>
                            <img class="product-img" src="../img/product/lighting_8.jpeg" alt="레시피 이미지" />
                        </div>
                        <div class="product-contents">
                            <p class="product_name">프링 6등 인테리어 조명 파이프 형식</p>
                            <p class="product_price">￦55,000</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <div>
                            <img class="product-img" src="../img/product/lighting_9.jpeg" alt="레시피 이미지" />
                        </div>
                        <div class="product-contents">
                            <p class="product_name">모엠 4등 방등 조명</p>
                            <p class="product_price">￦55,000</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <div>
                            <img class="product-img" src="../img/product/lighting_10.jpeg" alt="레시피 이미지" />
                        </div>
                        <div class="product-contents">
                            <p class="product_name">LED 아로스 조명</p>
                            <p class="product_price">￦55,000</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <div>
                            <img class="product-img" src="../img/product/lighting_11.jpeg" alt="레시피 이미지" />
                        </div>
                        <div class="product-contents">
                            <p class="product_name">코니아 7등 인테리어 조명</p>
                            <p class="product_price">￦55,000</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <div>
                            <img class="product-img" src="../img/product/lighting_12.jpeg" alt="레시피 이미지" />
                        </div>
                        <div class="product-contents">
                            <p class="product_name">프링 6등 인테리어 조명 파이프 형식</p>
                            <p class="product_price">￦55,000</p>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="btnGO">
                <a href="product_write.php"><p>상품 등록</p></a>
            </div>
        </div>
    </main>
    <?php include_once '../include/footer.php' ?>   