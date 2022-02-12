<?php
    $conn = mysqli_connect('localhost', 'root', '1234', 'mhf');
    $sql = "select * from member";
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
                <div id="left" class="qna_div">
                    <div class="inner_title">
                        <h2>개인정보 수집 및 이용 동의</h2>
                    </div>
                    <dl class="tpl_policy">
                        <dd>
                            <p>
                                <span style="color: rgb(51, 51, 51); font-weight: bold;">개인정보의 수집 및 이용에 대한 안내</span><br><br>
                                <span>수집 항목 : 이름, 이메일, 전화번호, IP주소</span><br>
                                <span>수집 목적 : 상담 문의 접수 및 결과 회신</span><br>
                                <span>이용 기간 : 원칙적으로 개인정보 수집 및 이용목적이 달성된 후에 해당 정보를 지체 없이 파기합니다.</span><br>
                                <span style="color: rgb(51, 51, 51); margin-left: 70px;">단, 관계법령의 규정에 의하여 필요가 있는 경우 일정기간 동안 개인정보를 보관할 수 있습니다.</span><br><br>
                                <span style="color: rgb(51, 51, 51);">그 밖의 사항은 m.h.f 개인정보취급방침을 준수합니다.</span>
                            </p>
                        </dd>
                        <dt class="inputfix">
                            <input type="checkbox" id="chk_policy" title="개인정보 수집 및 이용 동의가 필요합니다." class="required">
                            <label for="chk_policy">개인정보 수집 및 이용에 동의합니다.</label>
                        </dt>
                    </dl>
                    <div class="inner_title">
                        <h2>A/S</h2><br/>
                        <p>배송받으신 m.h.f 제품에 이상이 생겼다면 문의해주시기 바랍니다.<br/>
                            고객님의 불편을 신속하고 편리하게 처리하기 위해 온라인으로 A/S신청을 받고 있습니다.
                        </p><br/>
                        <p>- 매주 월~금요일 09:30~17:30<br/>
                            - 점심시간 12:30~13:30, 토/일/공휴일 상담실 휴무
                        </p>
                    </div>
                </div>
                <div id="right" class="qna_div">
                    <div class="inner_title">
                        <h2>문의내용 입력</h2>
                    </div>
                    <form action="../process/qna_write_process.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="custom_id" value="<?= $row['custom_id'] ?>">
                    <input type="hidden" name="username" value="<?=$row3['username']?>">
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
                                <td><input type="text" name="ask_title" /></td>
                            </tr>
                            <tr>
                                <th>내용</th>
                                <td>
                                    <textarea name="ask_content" id="ask_content" cols="70" rows="20"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>첨부파일</th>
                                <td><input type="file" name="ask_photo" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="btn">
                                    <input type="submit" value="등록" />
                                    <a href="../"><input type="reset" value="취소"></input></a>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php include_once '../include/footer.php' ?> 