<?php
    $conn = mysqli_connect('localhost', 'minkyoung', 'alsrud12!', 'minkyoung');
    $sql = "select * from board_ask";
    $result = mysqli_query($conn, $sql);

    $sql2 = "select * from member";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);
?>
<?php include_once '../include/header.php' ?>
    <main>
    <div id="qna_inner" class="innerCon_small">
            <div id="qna_top">
                <h1>Q&A</h1>
            </div>
            <div id="qna">
                <div id="qna-list">
                    <table id="qna_table">
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>등록자</th>
                            <th>날짜</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr class=\"innerCell\">";
                                echo "<td>{$row['num']}</td>";
                                echo "<td id=\"review_title\"><a href='qna_view.php?no={$row['num']}'>{$row['ask_title']}</a></td>";
                                echo "<td>{$row2['username']}</td>";
                                echo "<td>{$row['ask_date']}</td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>           
            </div>
            <?php
                if($userid!=="") {
            ?>
            <div class="btnGO">
                <a href="qna_write.php"><p>문의하기</p></a>
            </div>
            <?php
                }
                else if($userid==""){
            ?>
            <div class="btnGO">
                <a onclick="event.preventDefault(); alert('로그인이 필요한 서비스입니다.');" href="qna_write.php"><p>문의하기</p></a>
            </div>
            <?php
                }
            ?>
        </div>
    <main>
<?php include_once '../include/footer.php' ?> 