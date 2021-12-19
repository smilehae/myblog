<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        $id=$_POST['id'];
        $nickname=$_POST['nickname'];
        $password=$_POST['pw'];
        $content=$_POST['content'];
        $pid = $_POST['pid'];
        
        echo "$id $nickname $password $content";

        $conn=mysqli_connect("127.0.0.1","root","");
        if(!$conn){
            echo "link fail";
            exit;
        }
        mysqli_query($conn,"use blog");
        mysqli_set_charset($conn,"utf8");
        $result = mysqli_query($conn,"select * from comments where id='$id'");
        if(mysqli_num_rows($result)==0){
            echo "존재하지 않는 데이터입니다.";
            exit;
        }
        $result=mysqli_query($conn,
        "update comments set nickname='$nickname', pw='$password',
         content='$content' where id='$id'");
         if(!$result){
            echo "데이터 변경 실패.".$conn->error;
            exit;
        }
        // echo "데이터를 변경하였습니다.";
         
         
         mysqli_close($conn);
         echo "<script>window.location.href='./subpage.php?id=$pid';</script>";


?>
    </body>
</html>