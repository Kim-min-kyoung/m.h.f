<?php
    $conn = mysqli_connect('localhost', 'root', '1234', 'mhf');
    $sqlstr = "delete from board_ask
                where num = {$_POST['no']}";
    $result = mysqli_query($conn, $sqlstr);
    if($result){
        echo "삭제되었습니다.";
        header('Location: ../qna/qna.php');
    }
    else {
        echo "실패했습니다.";
    }
?>