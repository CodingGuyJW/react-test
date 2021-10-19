<!-- create-table.php -->
<!DOCTYPE html>
<html lang="en">
<head><title>upload-ok</title></head>
<body></body>
</html>

<?php
    include_once "db.php";
    include_once "check.php";

    $query = "CREATE TABLE works(
        num INT NOT NULL AUTO_INCREMENT, 
        category VARCHAR(100),
        title VARCHAR(100), 
        thumbnail VARCHAR(100),
        projectIntro TEXT,
        contents TEXT,
        dateStart DATE,
        dateEnd DATE,
        PRIMARY KEY(num)
    )";
    @mysqli_query($connect,$query);
    
?>

<style>
    body{background:#000;color:#fff;}
</style>

<script>
    location.href="portfolio-list.php";
</script>
