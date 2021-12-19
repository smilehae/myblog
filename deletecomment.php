<html>
    <head>
        <meta charset="utf-8"/>
    </head>
    <body>
        <?php
        $id = $_GET['id'];
        $pid=$_GET['pid'];
        //연결
        $conn=mysqli_connect("127.0.0.1","root"."");
        if(!$conn){
            echo "link failure";
            exit;
        }
        mysqli_query($conn,"use blog");
        $result = mysqli_query($conn,"select * from comments where id='$id'");
        if(mysqli_num_rows($result)==0){
            echo " 해당 데이터는 존재하지 않습니다. ";
            exit;
        }
        $result = mysqli_query($conn,"delete from comments where id='$id'");
        if(!$result){
            echo "데이터 삭제 실패!";
        }
        else{
            // echo "데이터 삭제가 완료되었습니다.";
        }
        mysqli_close($conn);
        echo "<script>window.location.href='./subpage.php?id=$pid';</script>";

        ?>
    </body>
</html>