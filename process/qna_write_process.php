<?php
    var_dump($_FILES);
    var_dump($_POST);
    
    // 파일타입 및 확장자 체크
    $filetypeArr = explode('/', $_FILES['ask_photo']['type']);
    // 파일타입
    $filetype = $filetypeArr[0];
    // 파일 확장자
    $fileExt = $filetypeArr[1];
    // 확장자 검사
    $fileCheck = false;
    // 확장자가 jpg이거나 jpeg이거나 gif이거나 png일 때는 fileCheck에 true할당
    if($fileExt == "jpg" || $fileExt == "jpeg" || $fileExt == "gif" || $fileExt == "png") {
        $fileCheck = true;
    }
    // 이미지 파일이 맞는지 체크
    if($filetype == "image") {
        // 허용된 확장자만 업로드 (그 외에는 업로드 불가)
        if($fileCheck) {
            // 임시파일경로 변수에 할당
            $tempFile = $_FILES['ask_photo']['tmp_name'];
            // 이미지파일을 저장할 경로지정
            $resFile = "../upload/ask/{$_FILES['ask_photo']['name']}";
            // 임시파일 위치에서 저장할 경로로 파일 위치 옮기기
            $imgUpload = move_uploaded_file($tempFile, $resFile);
            if($imgUpload) {
                echo "파일이 업로드 되었습니다.";
            }
            else {
                echo "파일 업로드에 실패했습니다.";
            }
        }
    }
    $conn = mysqli_connect('localhost', 'root', '1234', 'mhf');
    $sqlstr = "insert into board_ask(ask_photo, ask_title, ask_content, ask_date, custom_id)
               values('{$resFile}', '{$_POST['ask_title']}', '{$_POST['ask_content']}', now(), '{$_POST['custom_id']}')";
    echo $sqlstr;
    $result = mysqli_query($conn, $sqlstr);
    if($result) {
        echo "업로드가 되었습니다.";
        echo "<script>location.href='../qna/qna.php'</script>";
    }
    else {
        echo "업로드가 되지 않았습니다.";
    }
?>