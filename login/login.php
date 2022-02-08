<?php include_once '../include/header.php' ?>
    <main>
        <div id="login_inner" class="innerCon">
            <div id="sub_title">
                <h1>Login</h1>
            </div>
            <div id="logincont">
                <div id="logincont_inner"></div>
            </div>
            <table id="login_table">
                <form action="../process/login_process.php" id="login_Form" method="post">
                    <tr>
                        <td class="td_header">아이디</td>
                        <td><input type="text" name="userid" id="userid"></td>
                        <td rowspan="2">
                            <button id="loginBtn">로그인</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_header">비밀번호</td>
                        <td><input type="password" name="userpw" id="userpw" placeholder="영어,숫자포함 8자이상"></td>
                    </tr>
                    <tr id="checkForm">
                        <td><input type="checkbox" name="userid_ck">  아이디 저장</td>
                        <td>
                            <ul>
                                <li><a href="#">아이디/비밀번호 찾기</a></li>
                                <li><a href="join.php">회원가입</a></li>
                            </ul>
                        </td>
                    </tr>
                </form>
            </table>
            <div id="loginSns" class="clearfix">
                <h2>SNS로그인</h2>
                <ul>
                    <li><img src="../img/login/shape-naver.png"><a href="#">naver</a></li>
                    <li><img src="../img/login/shape-kakao.png"><a href="#">kakao</a></li>
                    <li><img src="../img/login/shape-facebook.png"><a href="#">facebook</a></li>
                    <li><img src="../img/login/shape-instagram.png"><a href="#">instagram</a></li>
                    <li><img src="../img/login/shape-google.png"><a href="#">google+</a></li>
                    <li><img src="../img/login/shape-apple.png"><a href="#">apple</a></li>
                </ul>
            </div>
            <div id="logincont_inner"></div>
            <!-- <div id="loginJoin">
                <div id="joinncont_inner"></div>
                <p>아직 m.h.f의 회원이 아니신가요?</p>
                <p>회원가입하고 다양한 혜택과 서비스를 이용해보세요!</p>
                <div class="joinBtn">
                    <p>카카오톡 1초 회원가입</p>
                </div>
            </div> -->
        </div>
    </main>
    <?php include_once '../include/footer.php' ?>   