<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-ok</title>
</head>
<body>
    <!-- login-ok.php -->
</body>
</html>

<style>
    body{background:#000;color:#fff;}
</style>

<?php
    @session_start();

    include_once 'db.php';

    $id=$_POST['id'];
    $pw=$_POST['pw'];
    $query = "SELECT * FROM admin 
    WHERE id='$id' AND pw='$pw'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_num_rows($result);

    if($row){
        $_SESSION['id'] = 'admin';
        echo 
        "<script>
            location.href='portfolio-list.php';
        </script>";
    }else{
        echo 
        "<script>
            alert('ID와 Password를 확인해주세요.');
            history.back();
        </script>";
    }
?>
