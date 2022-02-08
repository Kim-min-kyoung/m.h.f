<?php
    var_dump($_FILES);
    var_dump($_POST);

    // 파일타입 및 확장자 체크
    $filetypeArr = explode('/', $_FILES['ask_photo']['type']);
    // 파일타입
    $filetype = $filetypeArr[0];
    // 파일 확장자 - 이 부분 다시보기
    $fileExt = $filetypeArr[1];
    // 확장자 검사
    $fileCheck = false;
    // 확장자가 jpg이거나 jpeg이거나 gif이거나 png일 때는 fileCheck에 true할당
    if($fileExt == "jpg" || $fileExt == "jpeg" || $fileExt == "gif" || $fileExt == "png") {
        $fileCheck = true;
    }
    //이미지 파일이 맞는지 체크
    if($filetype == "image"){
        //허용된 확장자만 업로드(그외에는 업로드 불가)
        if($fileCheck){
            //임시파일경로 변수에 할당
            $tempFile = $_FILES['ask_photo']['tmp_name'];
            //이미지파일을 저장할 경로지정
            $resFile = "../upload/ask/{$_FILES['ask_photo']['name']}";
            //임시파일위치에서 저장할 경로로 파일위치 옮기기
            $imgUpload = move_uploaded_file($tempFile,$resFile);
            if($imgUpload){
                echo "파일이 업로드 되었습니다.";
            }else {
                echo "파일 업로드에 실패했습니다.";
            }
        }
    }

    // update 테이블명
    // set 컬럼명 = 값, 컬럼명 = 값
    // where 컬럼명 = 값
    $conn = mysqli_connect('localhost', 'root', '1234', 'mhf');
    $sqlstr = "update board_ask 
                set ask_title='{$_POST['ask_title']}',
                ask_content='{$_POST['ask_content']}',
                ask_date=NOW(), 
                ask_photo='{$resFile}'
                where num={$_POST['no']}";
    echo $sqlstr;
    $result = mysqli_query($conn, $sqlstr);
    if($result){
        echo "성공";
        header('Location:../qna/qna.php');
    }
    else {
        echo "실패";
    }
?>