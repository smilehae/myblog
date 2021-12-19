<html>
    <head>
        <meta charset="utf-8">
    </head>
        <body>
            <?php
            $pid = $_POST['id'];
            $nickname = $_POST['nickname'];
            $pw = $_POST['pw'];
            $content = $_POST['content'];
                       
            $conn = mysqli_connect("127.0.0.1","root");
            mysqli_set_charset($conn,"utf8");
            if(!$conn){
                echo "link fail";
                exit;
            }
            mysqli_query($conn,"use blog");

            //$result = mysqli_query($conn,"select * from comments");
            $result = mysqli_query($conn, "insert into comments(nickname, pw,content,pid) values ('$nickname','$pw','$content','$pid')");
            if($result){
               // echo "트랜잭션 성공";
            }
            else{
                // 트랜잭션에 대한 에러 메시지 확인
                echo "트랜잭션 실패" .$conn->error;
            }
            mysqli_close($conn);
            echo "<script>window.location.href='./subpage.php?id=$pid';</script>";
            ?>
    </body>
</html>
