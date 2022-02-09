<?php
    $conn = mysqli_connect('localhost', 'root', '1234', 'mhf');
    $sqlstr4 = "select * from product where prd_group = 'COOKING' order by prd_name asc";
    $result4 = mysqli_query($conn, $sqlstr4);
    function showlist(){
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
                    <h1><a href="./product.php">PRODUCT</a></h1>
                    <span><i class="fas fa-chevron-right"></i></span>
                    <ul>
                        <li><a href="./product_lighting.php">LIGHTING</a></li>
                        <li><a href="./product_furnishing.php">FURGINISHING</a></li>
                        <li><a href="./product_cooking.php">COOKING</a></li>
                    </ul>
                </div>
                <!-- <div id="right_top">
                    <ul>
                        <li>name</li>
                        <li>new</li>
                        <li>price</li>
                    </ul>
                </div> -->
            </div>
            <div id="product">
                <div id="product-list">
                    <?php showlist(); ?>
                </div>
            </div>
            <div class="btnGO">
                <a href="product_write.php"><p>상품 등록</p></a>
            </div>
        </div>
    </main>
    <?php include_once '../include/footer.php' ?>   