<?php
    var_dump($_FILES);
    var_dump($_POST);
    
    // 파일타입 및 확장자 체크
    $filetypeArr = explode('/', $_FILES['ask_photo']['type']);
    $filetype = $filetypeArr[0];
    $fileExt = $filetypeArr[1];
    $fileCheck = false;
    if($fileExt == "jpg" || $fileExt == "jpeg" || $fileExt == "gif" || $fileExt == "png") {
        $fileCheck = true;
    }
    if($filetype == "image") {
        if($fileCheck) {
            $tempFile = $_FILES['ask_photo']['tmp_name'];
            $resFile = "../upload/ask/{$_FILES['ask_photo']['name']}";
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