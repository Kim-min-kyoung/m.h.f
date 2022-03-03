<?php
    $conn = mysqli_connect('localhost', 'minkyoung', 'alsrud12!', 'minkyoung');
    $sql = "select * from product where prd_id={$_GET['no']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $sql2 = "select * from board_review where prd_id={$_GET['no']}";
    $result2 = mysqli_query($conn,$sql2);
    function showlist(){
        global $result2;
        while($row2 = mysqli_fetch_array($result2)){
            echo "<ul class=\"review_list\">";
            echo "<li class=\"review_rating\">{$row2['rating']}</li>";
            echo "<li class=\"review_content\">{$row2['review_content']}</li>";
            echo "<li class=\"review_name\">{$row2['username']}</li>";
            echo "<li class=\"review_date\">{$row2['wdate']}</li>";
            echo "<form action='../process/review_delete_proces.php' method='POST'>";
            echo "<input type='hidden' name='id' value={$row2['id']} />";
            echo "<li class=\"review_btn\"><button class =\"delete\">X</button></li>";
            echo "</form>";
            echo "</ul>";
        }
    }
    $sql3 = "select * from member";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($result3);
    
?>
    <main>
<?php include_once '../include/header.php' ?>
        <div id="product_inner" class="innerCon_small clearfix">
            <div id="product_top">
                <div id="left_top">
                    <h1><?= $row['prd_group'] ?></h1>
                    <span><i class="fas fa-chevron-right"></i></span>
                    <h2><a href="product.php">PRODUCT</a></h2>
                </div>
            </div>
            <form name="product_form" action="../process/cart_process.php" method="get">
            <input type="hidden" name="no" value="<?=$_GET['no']?>">
                <div id="product_view_left">
                    <img src="<?=$row['prd_photo']?>" />
                </div>
                <div id="product_view_right">
                    <h2>
                        <span class="view_group"><?= $row['prd_group'] ?></span><br/>
                        <span class="view_name"><?= $row['prd_name'] ?></span>
                    </h2>
                    <p class="view_price">￦<?= number_format($row['prd_price']) ?></p>
                    <p class="view_content"><?= $row['prd_content'] ?></p>
                    <p class="view_num">
                        수량 : 
                        <input type="button" value="-" onclick="del();">
                        <input type="text" id="amount" name="amount" value="1" size="1" onchange="change();">
                        <input type="button" value="+" onclick="add();">
                    </p>
                    <p class="view_total">
                        총 상품금액
                        <input type="text" name="sum" value="<?=number_format($row['prd_price'])?>" readonly>원
                        <input type="hidden" name="initprice" value="<?=$row['prd_price']?>" />
                    </p>
                    <?php
                        if($userid !== ""){
                    ?>
                    <div class="btnGO">
                        <button type="submit">ADD TO CART</button>
                    </div>
                    <?php
                        }
                        else if($userid == "") {
                    ?>
                    <div class="btnGO">
                    <a onclick="event.preventDefault(); alert('로그인이 필요한 서비스입니다.');">
                        <button type="submit">ADD TO CART</button>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </form>
            </div>
            <div id="product_review" class="innerCon_small">
                <div id="review_top">
                    <div id="left_top">
                        <h2>REVIEW</h2>
                    </div>
                    <?php
                        if($userid !== "") {
                    ?>
                    <div id="right_top">
                        <a href="javascript:reviewTable();"><p class="openBtn">리뷰 작성</p></a>
                    </div>
                    <?php
                        }
                        else if($userid == "") {
                    ?>
                    <div id="right_top">
                        <a onclick="event.preventDefault();alert('로그인이 필요한 서비스입니다.');" href="../login/login.php"><p class="openBtn">리뷰 작성</p></a>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <div id="review_Form" style="display: none;">
                <form action="../process/review_write_process.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="prd_id" value="<?=$row['prd_id']?>">
                <input type="hidden" name="custom_id" value="<?=$row3['custom_id']?>">
                <input type="hidden" name="username" value="<?=$row3['username']?>">
                    <table id="review_table">
                        <tr>
                            <th>작성자</th>
                            <td id="username">
                                <?php echo $username;?>
                            </td>
                            <th>평가</th>
                            <td>
                            <fieldset id="rating">
                                <label for="rate1">⭐</label><input type="radio" name="rating" value="⭐ ⭐ ⭐ ⭐ ⭐" id="rate1">
                                <label for="rate2">⭐</label><input type="radio" name="rating" value="⭐ ⭐ ⭐ ⭐" id="rate2">
                                <label for="rate3">⭐</label><input type="radio" name="rating" value="⭐ ⭐ ⭐" id="rate3">
                                <label for="rate4">⭐</label><input type="radio" name="rating" value="⭐ ⭐" id="rate4">
                                <label for="rate5">⭐</label><input type="radio" name="rating" value="⭐" id="rate5">
                            </fieldset>
                            </td>
                            <th>한줄 리뷰</th>
                            <td>
                                <textarea name="review_content" id="review_content"></textarea>
                            </td>
                            <td class="btn">
                                <input type="submit" value="등록" />
                            </td>
                        </tr>
                    </table>
                </form>
                </div>
                <div id="review_inner">
                    <?php showlist(); ?>
                </div>
            </div>
        </div>
    </main>
    <?php include_once '../include/footer.php' ?>  