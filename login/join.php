<?php include_once '../include/header.php' ?>
    <main>
        <div id="join_inner" class="innerCon">
            <div id="sub_title">
                <h1>Join</h1>
            </div>
            <div id="joincont_inner"></div>
            <form id="joinform" class="joinform" method="POST" action="../process/join_process.php">
                <table id="join_table">
                <tr>
                    <th>이름</th>
                    <td><input type="text" name="username" id="username" size="30"></td>
                </tr>
                <tr>
                    <th>생년월일</th>
                    <td><input type="text" name="userbirth" id="birth" data-pattern="gdNum" maxlength="6" size="30" placeholder="여섯자리 ex)940520"></td>
                </tr>
                <tr>
                    <th>아이디</th>
                    <td><input type="text" name="userid" id="userid" size="30">
                    </td>
                </tr>
                <tr>
                    <th>비밀번호</th>
                    <td><input type="password" name="userpw" id="userpw" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" size="30" placeholder="영어,숫자포함 8자이상"></td>
                <!-- </tr>
                <tr> -->
                    <th>비밀번호확인</th>
                    <td><input type="password" name="userpwchk" id="userpwchk" size="30"></td>
                </tr>
                <tr class="long_cell">
                    <th>휴대폰번호</th>
                    <td colspan="2"><input type=text name="tel" id="tel" maxlength="11" data-pattern="gdNum" placeholder=" - 없이 입력하세요." size="30">
                    <div class="form-element" style="margin-top:5pt;">
                        <input type="checkbox" class="checkbox" value="y">
                        <label for="maillingFl" class="">SMS 수신에 동의하고, 매월 이벤트/할인혜택 정보를 받아보세요!</label>
                    </div>
                    </td>
                </tr>
                <tr class="long_cell">
                    <th>주소</th>
                    <td colspan="2">
                    <input type="text" name="useraddr_num" id="useraddr_num" placeholder="우편번호" style="margin-bottom:4pt;" size="13">
                    <input type="button" onclick="sample6_execDaumPostcode()" value="우편번호 찾기" style="margin-left:4pt;
                    border:none; background-color:#cccccc; width:100px; cursor:pointer; "><br>
                    <input type="text" name="useraddr" id="useraddr" placeholder="주소" style="margin-bottom:4pt;" size="30"><br>
                    <input type="text" name="useraddr_detailAddress" id="useraddr_detailAddress" placeholder="상세주소" style="margin-bottom:4pt;" size="25">
                    <input type="text" id="sample6_extraAddress" placeholder="참고항목" style="margin-bottom:4pt;" size="25">
                    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
                    <script>
                        function sample6_execDaumPostcode() {
                        new daum.Postcode({
                            oncomplete: function(data) {
                            var addr = '';
                            var extraAddr = '';
        
                            if (data.userSelectedType === 'R') { 
                                addr = data.roadAddress;
                            } else {
                                addr = data.jibunAddress;
                            }
        
                            if (data.userSelectedType === 'R') {
                                if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                                extraAddr += data.bname;
                                }
                                if (data.buildingName !== '' && data.apartment === 'Y') {
                                extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                                }
                                if (extraAddr !== '') {
                                extraAddr = ' (' + extraAddr + ')';
                                }
                                document.getElementById("sample6_extraAddress").value = extraAddr;
                            } else {
                                document.getElementById("sample6_extraAddress").value = '';
                            }

                            document.getElementById('useraddr_num').value = data.zonecode;
                            document.getElementById("useraddr").value = addr;
                            document.getElementById("useraddr_detailAddress").focus();
                            document.getElementById("useraddr_detailAddress").value
                            }
                        }).open();
                        }
                    </script>
                    </td>
                </tr>
                <tr class="long_cell">
                    <th>이메일</th>
                    <td colspan="2">
                    <div>
                        <input type="text" name="email" id="email" style="margin-bottom:5px;">
                        <select name="email_addr" style="height:25px; margin-left: 3pt;">
                        <option value="">직접입력</option>
                        <option value="@naver.com">@naver.com</option>
                        <option value="@hanmail.net">@hanmail.net</option>
                        <option value="@daum.net">@daum.net</option>
                        <option value="@nate.com">@nate.com</option>
                        <option value="@hotmail.com">@hotmail.com</option>
                        <option value="@gmail.com">@gmail.com</option>
                        <option value="@icloud.com">@icloud.com</option>
                        </select>
                    </div>
                    <div class="form-element" style="margin-top:3pt;">
                        <input type="checkbox" class="checkbox" value="y">
                        <label for="maillingFl" class="">정보/이벤트 메일 수신에 동의합니다.</label>
                    </div>
                    </td>
                </tr>
                </table>
                <div id="joincont_inner"></div>
                <div class="btn">
                    <button type="submit">회원가입</button>
                    <button class="button" onclick="event.preventDefault(); location.href='../index.php'">취소</button>
                </div>
            </form>
        </div>
    </main>
    <?php include_once '../include/footer.php' ?>   