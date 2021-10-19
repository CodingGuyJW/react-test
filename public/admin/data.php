<!-- data.php -->
<!DOCTYPE html>
<html lang="en">
<head<title>data</title></head>
<body></body>
</html>
<?
    include_once "db.php";
    include_once "check.php";
    $num = $_GET['num'];
    $query = "SELECT * FROM works 
                WHERE num='$num'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);
    echo $row['contents'];
?>
<style>
    body{background:#000; color:#fff;}
</style>