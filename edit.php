<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php

            $category = $_POST['category'];
            $title = $_POST['title'];
            $nickname = $_POST['nickname'];
            $password = $_POST['password'];
            $content=$_POST['content'];

            $conn = mysqli_connect("127.0.0.1","root");
            if(!$conn){
                echo "link failed";
                exit;
            }
            mysqli_query($conn,"use blog");
            mysqli_set_charset($conn,"utf8");

            $sql = "select * from postdata where title='$title' and content='$content'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                echo "해당 내용은 중복으로 한번만 들어갑니다.";
            }
            else{
                $sql = "insert into postdata(category,title,nickname,password,content) values('$category','$title','$nickname','$password','$content')";
                mysqli_query($conn,$sql);
            }
            

            mysqli_close($conn);
            header('Location: ./index.html')
    ?>
    </body>
</html>
