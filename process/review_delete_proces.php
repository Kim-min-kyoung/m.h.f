<?php
    session_start();

    $conn = mysqli_connect('localhost','minkyoung','alsrud12!','minkyoung');
    $id = $_POST['id'];
    $sql = "DELETE from board_review WHERE id='$id'";

    $result=mysqli_query($conn,$sql);
    if($result===true){
 ?>
    <script>
    history.go(-1);
    </script>
 <?php
}
else {
  echo("
    <script>
    window.alert('오류가 발생했습니다.');
    </script>");
}
mysqli_close($conn);
?>