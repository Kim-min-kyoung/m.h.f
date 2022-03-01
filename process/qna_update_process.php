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
    if($filetype == "image"){
        if($fileCheck){
            $tempFile = $_FILES['ask_photo']['tmp_name'];
            $resFile = "../upload/ask/{$_FILES['ask_photo']['name']}";
            $imgUpload = move_uploaded_file($tempFile,$resFile);
            if($imgUpload){
                echo "파일이 업로드 되었습니다.";
            }else {
                echo "파일 업로드에 실패했습니다.";
            }
        }
    }

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