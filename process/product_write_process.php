<?php
    var_dump($_FILES);
    var_dump($_POST);
    
    // 파일타입 및 확장자 체크
    $filetypeArr = explode('/', $_FILES['prd_photo']['type']);
    $filetype = $filetypeArr[0];
    $fileExt = $filetypeArr[1];
    $fileCheck = false;
    if($fileExt == "jpg" || $fileExt == "jpeg" || $fileExt == "gif" || $fileExt == "png") {
        $fileCheck = true;
    }
    if($filetype == "image") {
        if($fileCheck) {
            $tempFile = $_FILES['prd_photo']['tmp_name'];
            $resFile = "../upload/product/{$_FILES['prd_photo']['name']}";
            $imgUpload = move_uploaded_file($tempFile, $resFile);
            if($imgUpload) {
                echo "파일이 업로드 되었습니다.";
            }
            else {
                echo "파일 업로드에 실패했습니다.";
            }
        }
    }
    $conn = mysqli_connect('localhost', 'minkyoung', 'alsrud12!', 'minkyoung');
    $sqlstr = "insert into product(prd_photo, prd_name, prd_price, prd_content, prd_group)
               values('{$resFile}', '{$_POST['prd_name']}', '{$_POST['prd_price']}', '{$_POST['prd_content']}', '{$_POST['prd_group']}')";
    echo $sqlstr;
    $result = mysqli_query($conn, $sqlstr);
    if($result) {
        echo "업로드가 되었습니다.";
        echo "<script>location.href='../product/product.php'</script>";
    }
    else {
        echo "업로드가 되지 않았습니다.";
    }
?>