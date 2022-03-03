<?php
    $conn = mysqli_connect('localhost', 'minkyoung', 'alsrud12!', 'minkyoung');

    $sql = "select * from board_ask where num={$_GET['no']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $sql2 = "select * from member";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);
?>
<?php include_once '../include/header.php' ?>
    <main>
        <div id="qna_inner" class="innerCon_small">
        <form action="qna_update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="no" value="<?=$_GET['no']?>">
            <div id="qna_top">
                <h1>Q&A</h1>
            </div>
            <div id="qna">
                <div id="qna-list">
                    <table id="qna_view_table">
                        <tr>
                            <th>제목</th>
                            <td><?= $row['ask_title'] ?></td>
                        </tr>
                        <tr>
                            <th>작성자</th>
                            <td><?= $row2['username'] ?></td>
                        </tr>
                        <tr>
                            <th>작성일자</th>
                            <td><?= $row['ask_date'] ?></td>
                        </tr>
                        <tr class="contentCell">
                            <td colspan="2" rowspan="2"><?= $row['ask_content'] ?><br/><br/>
                            <img src="<?=$row['ask_photo']?>" /></td>
                        </tr>
                    </table>
                </div>           
            </div>
            <div class="qnaBtn">
                <input type="hidden" name="no" value="<?=$_GET['no']?>">
                    <button>수정</button>
                </form>
                <form action="../process/qna_delete_process.php" method="post">
                    <input type="hidden" name="no" value="<?=$_GET['no']?>">
                    <button type="submit">삭제</button>
                </form>
                <a href="./qna.php"> <span>목록</span></a>
            </div>
        </div>
    <main>
<?php include_once '../include/footer.php' ?> 