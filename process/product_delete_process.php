<?php
    // delete from 테이블명
    // where 필드이름 = 값
    $conn = mysqli_connect('localhost', 'root', '1234', 'mhf');
    $sqlstr = "delete from product
                where prd_id = {$_POST['no']}";
    $result = mysqli_query($conn, $sqlstr);
    if($result){
        echo "삭제되었습니다.";
        header('Location: ../product/product.php');
    }
    else {
        echo "실패했습니다.";
    }
    // 리다이섹션
    // header('Location: ../qna/qna.php');
?>