<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        $id = $_GET['id'];
        echo "$id";

        $conn=mysqli_connect("127.0.0.1","root","");
        if(!$conn){
            echo "link fail";
            exit;
        }
        echo "link success";
        mysqli_query($conn,"use blog");
        mysqli_set_charset($conn,"utf8");
        $result = mysqli_query($conn,"select * from comments where id='$id'");
        if(mysqli_num_rows($result)==0){
            echo "존재하지 않는 데이터입니다.";
            exit;
        }
        $result=mysqli_query($conn,
        "update comments set nickname='$title', nickname='$nickname', password='$password',
         content='$content' where id='$id'");
         echo "데이터 변경이 완료되었습니다.";
         mysqli_close($conn);
        //  echo "<script>window.location.href='./subpage.php?id=$pid';</script>";
         ?>
    </body>
</html>