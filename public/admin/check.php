<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check</title>
</head>
<body>
    <!-- check.php -->
</body>
</html>

<style>
    body{background:#000; color:#fff;}
</style>

<?php
    session_start();
    if( !isset($_SESSION['id']) ){
        echo 
        "<script>
            alert('관리자 로그인 후 이용해 주세요');
            location.href='login.php';
        </script>";
    }else{
        if($_SESSION['id'] != 'admin'){
            echo 
            "<script>
                alert('관리자 로그인 후 이용해 주세요');
                location.href='login.php';
            </script>";
        }
    }
?>
