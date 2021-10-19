<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-admin</title>
</head>
<body>
    <!-- login.php -->
    <article>
        <h2>ADMIN LOGIN</h2>
        <div>
            <form action="login-ok.php" method="post">
                <span>ID</span>
                <input type="text" name="id">
                <span>Password</span> 
                <input type="password" name="pw">
                <input type="submit" value="login">
            </form>
        </div>
    </article>
</body>
</html>

<style>
    *{box-sizing: border-box;}
    body{background:#000;color:#fff;}
    article{
        width:300px; 
        border:1px solid #ddd;
        position:absolute;
        left:50%; top:50%;
        transform: translate(-50%, -50%);
    }
    article h2{
        margin:0;
        text-align:center;
        background:#777;
    }
    article div{
        padding:40px;
        display:flex;
        justify-content: space-between;
    }
    article div input{
        width:65%;
        display:inline-block;
        margin-bottom:5%;
    }
    article div input:last-child{
        width:20%;
        margin-left:42%;
    }
    article div span:nth-of-type(1){margin-right:23.7%;}
</style>

<?php


?>
