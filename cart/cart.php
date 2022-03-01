<?php
    $conn = mysqli_connect('localhost', 'root', '1234', 'mhf');
?>
<?php include_once '../include/header.php' ?>
    <main>
        <div id="cart_inner" class="innerCon_small">
            <div id="cart_top">
                <div id="left_top">
                    <h1>CART</h1>
                </div>
            </div>
            <table id="cart_table">
                <tr>
                    <th><input type="checkbox" id="all_chk" onclick="allchk()" /></th>
                    <th>이미지</th>
                    <th>상품명</th>
                    <th>금액</th>
                    <th>수량</th>
                    <th>합계</th>
                    <th></th>
                </tr>
                <?php
                    $sql = "SELECT * from member
                            where userid = '$userid'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $custom_id = $row['custom_id'];

                    $sql2 = "SELECT * from cart
                            WHERE custom_id = '$custom_id'";
                    $result2 = mysqli_query($conn, $sql2);

                    while($row2 = mysqli_fetch_array($result2)) {
                        $id = $row2['id'];
                        $sql3 = "SELECT * from product
                                where prd_id = {$row2['prd_id']}";
                        $result3 = mysqli_query($conn, $sql3);

                        while($row3 = mysqli_fetch_array($result3)) {
                            echo "<tr>";
                            echo "<td><input name='check[]' id='chk' type=checkbox value={$row2['total_price']}></td>";
                            if($row3['prd_photo']) { 
                                $prd_photo=$row3['prd_photo']; 
                                echo "<td class=\"img_cell\"><img class='products_cart' src='".$prd_photo."' /></td>"; }
                            if($row3['prd_name']) {
                                $prd_name=$row3['prd_name']; 
                                echo "<td>".$prd_name."</td>"; }
                            if($row3['prd_price']){
                                $prd_price=number_format($row3['prd_price']); 
                                echo"<td>".$prd_price."</td>";}
                        }

                        if($row2['prd_num']){
                            $prd_num = $row2['prd_num'];
                            echo "<td>".$prd_num."</td>";
                        }

                        if($row2['total_price']){
                            $total_price = $row2['total_price'];
                            echo "<td>".$total_price."</td>";}
                            echo "<form action='../process/cart_delete_proces.php' method='POST'>
                                    <td>
                                        <button><i class=\"far fa-trash-alt trash\"></i></button>
                                    </td>
                                    </tr>
                                    <input type='hidden' name='id' value='$id' />
                                </form>";
                        }
                        mysqli_close($conn);
                    ?>
                </table>
                <div id="total_btn">
                    <span><a href="../product/product.php">상품 더보기</a></span>
                    <span>선택상품 주문</span>
                    <span><a onclick="orderAll()">전체상품 주문</a></span>
                </div>
            </div>
        </div>
    </section>
    </main>
<?php include_once '../include/footer.php' ?>   