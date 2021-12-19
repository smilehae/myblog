<?php
    $id = $_GET['id'];
    //연결
    $conn=mysqli_connect("127.0.0.1","root"."");
    if(!$conn){
        echo "link failure";
        exit;
    }
    echo "link success";
    mysqli_query($conn,"use blog");
    $result = mysqli_query($conn,"select * from postdata where id='$id'");
    if(mysqli_num_rows($result)==0){
        echo " 해당 데이터는 존재하지 않습니다. ";
        exit;
    }
    mysqli_query($conn,"delete from postdata where id='$id'");
    mysqli_close($conn);
    header('Location: ./index.php');

?>