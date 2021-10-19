<!-- delete.php -->
<!DOCTYPE html>
<html lang="en">
<head><title>delete</title></head>
<body></body>
</html>

<?php
    include_once 'db.php';
    include_once "check.php";
    $numDel = $_GET['num'];
    $query = "DELETE FROM works 
              WHERE num=$numDel";
    mysqli_query($connect,$query);
?>

<style>
    body{background:#000; color:#fff;}
</style>

<script>
    location.href='portfolio-list.php';
</script>
