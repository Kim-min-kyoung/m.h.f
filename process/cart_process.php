<?php
    session_start();

    if(isset($_SESSION['userid'])){
        $userid =$_SESSION['userid'];
        $username=$_SESSION['username'];
    }
    else $userid="";

    echo $_GET['amount'];
    if(isset($_GET['amount'])){
        $prd_num=$_GET['amount'];
        $total_price=$_GET['sum'];
        $prd_id=$_GET['no'];
    }
    else {
        $prd_num="";
        $total_price="";
        $prd_id="";
    }

    $conn = mysqli_connect('localhost','root','1234','mhf');
    $sql = "SELECT *from member WHERE userid='$userid'";
    echo $sql;
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $custom_id = $row['custom_id'];

    if($result -> num_rows >= 1){
        $sql2="INSERT INTO cart(prd_num,prd_id,custom_id, total_price)
            VALUES(
                '$prd_num',
                '$prd_id',
                '$custom_id',
                '$total_price'
                )
            ";
        echo $sql2;
        $result2 = mysqli_query($conn, $sql2);
        if($result2 === true){
        header("Location:../cart/cart.php");
        }
        else{
            ?>
            <script>
            window.alert("잠시 문제가 생겼으니 다시 시도해주세요");
            </script>
            <?php
            }
            }
        mysqli_close($conn);
?>
