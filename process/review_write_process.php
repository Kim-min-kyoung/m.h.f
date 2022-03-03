<?php
    var_dump($_FILES);
    var_dump($_POST);
    
    $conn = mysqli_connect('localhost', 'minkyoung', 'alsrud12!', 'minkyoung');
    $sqlstr = "insert into board_review(review_content, rating, wdate, prd_id, custom_id, username)
               values('{$_POST['review_content']}', '{$_POST['rating']}', now(), '{$_POST['prd_id']}', '{$_POST['custom_id']}', '{$_POST['username']}')";
    echo $sqlstr;
    $result = mysqli_query($conn, $sqlstr);
    if($result) {
        echo "업로드가 되었습니다.";
        echo "<script>location.href='../product/product_list.php'</script>";
    }
    else {
        echo "업로드가 되지 않았습니다.";
    }
?>