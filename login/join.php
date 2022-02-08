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
                            // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
        
                            // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                            // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                            var addr = ''; // 주소 변수
                            var extraAddr = ''; // 참고항목 변수
        
                            //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                            if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                                addr = data.roadAddress;
                            } else { // 사용자가 지번 주소를 선택했을 경우(J)
                                addr = data.jibunAddress;
                            }
        
                            // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                            if (data.userSelectedType === 'R') {
                                // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                                // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                                if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                                extraAddr += data.bname;
                                }
                                // 건물명이 있고, 공동주택일 경우 추가한다.
                                if (data.buildingName !== '' && data.apartment === 'Y') {
                                extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                                }
                                // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                                if (extraAddr !== '') {
                                extraAddr = ' (' + extraAddr + ')';
                                }
                                // 조합된 참고항목을 해당 필드에 넣는다.
                                document.getElementById("sample6_extraAddress").value = extraAddr;
        
                            } else {
                                document.getElementById("sample6_extraAddress").value = '';
                            }
        
                            // 우편번호와 주소 정보를 해당 필드에 넣는다.
                            document.getElementById('useraddr_num').value = data.zonecode;
                            document.getElementById("useraddr").value = addr;
                            //document.getElementById("useraddr").value
                            // 커서를 상세주소 필드로 이동한다.
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