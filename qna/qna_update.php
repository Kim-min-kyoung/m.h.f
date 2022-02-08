<?php
    $conn = mysqli_connect('localhost', 'root', '1234', 'mhf');

    $sql = "select * from board_ask where num={$_POST['no']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>
<?php include_once '../include/header.php' ?>
    <main>
        <div id="qna_inner" class="innerCon">
            <div id="create_title">
                <h1>Q&A</h1>
                <p>m.h.f에 관하여 궁금한 점을 남겨주시면 최대한 빠르게 답변드리겠습니다.</p>
            </div>
            <div id="qna_main">
                <section id="left">
                    <div class="inner_title">
                        <h2>A/S</h2><br/>
                        <p>배송받으신 m.h.f 제품에 이상이 생겼다면 문의해주시기 바랍니다.<br/>
                            고객님의 불편을 신속하고 편리하게 처리하기 위해 온라인으로 A/S신청을 받고 있습니다.
                        </p><br/>
                        <p>- 매주 월~금요일 09:30~17:30<br/>
                            - 점심시간 12:30~13:30, 토/일/공휴일 상담실 휴무
                        </p>
                    </div>
                </section>
                <section id="right">
                    <div class="inner_title">
                        <h2>문의내용 입력</h2>
                    </div>
                    <form action="../process/qna_update_process.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="custom_id" value="<?= $row['custom_id'] ?>">
                    <input type="hidden" name="no" value="<?=$_POST['no']?>">
                        <table id="qna_Ctable"> 
                            <tr>
                                <th>이름</th>
                                <td><?php echo "{$_SESSION['username']}";?></td>
                            </tr>
                            <tr>
                                <th>이메일</th>
                                <td><?php echo "{$_SESSION['email']}";?></td>
                            </tr>
                            <tr>
                                <th>전화번호</th>
                                <td><?php echo "{$_SESSION['tel']}";?></td>
                            </tr>
                            <tr>
                                <th>제목</th>
                                <td><input type="text" value="<?= $row['ask_title']?>" name="ask_title"></td>
                            </tr>
                            <tr>
                                <th>내용</th>
                                <td>
                                    <textarea name="ask_content" id="ask_content" cols="70" rows="20"><?=$row['ask_content']?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>첨부파일</th>
                                <td><input type="file" value="<?=$row['ask_photo']?>" name="ask_photo"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="btn">
                                    <input type="submit" value="등록" />
                                    <a href="./qna.php"><input type="reset" value="취소"></input></a>
                                </td>
                            </tr>
                        </table>
                    </form>
                </section>
            </div>
        </div>
    </main>
<?php include_once '../include/footer.php' ?> 