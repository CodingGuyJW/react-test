<!-- upload-ok.php -->
<!DOCTYPE html>
<html lang="en">
<head><title>upload-ok</title></head>
<body></body>
</html>

<?php
    include_once "db.php";
    include_once "check.php";

    $title = $_POST['title'];
    $category = $_POST['category'];
    $thumbnail = $_FILES['thumbnail'];
    $projectIntro = $_POST['projectIntro'];
    $contents = $_POST['contents'];
    $dateStart = $_POST['dateStart'];
    $dateEnd = $_POST['dateEnd'];

    echo $title,"<br>";
    echo $category,"<br>";
    echo $thumbnail['name'],"<br>";
    echo $projectIntro,"<br>";
    echo $contents,"<br>";
    echo $dateStart,"<br>";
    echo $dateEnd,"<br>";

    @mkdir('./files',0777,false);

    $fileName = $thumbnail['name'];
    $tmpName = $thumbnail['tmp_name'];
    move_uploaded_file($tmpName,'./files/'.$fileName);

    $query = "INSERT INTO 
            works(
                title,category,
                thumbnail,
                projectIntro,contents,
                dateStart,dateEnd
            )
            VALUES(
                '$title','$category',
                '$fileName',
                '$projectIntro','$contents',
                '$dateStart','$dateEnd'
            )";

    mysqli_query($connect,$query);
?>

<style>
    body{background:#000;color:#fff;}
</style>

<script>
    location.href="portfolio-list.php";
</script>
