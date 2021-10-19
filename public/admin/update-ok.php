<!-- update-ok.php -->
<!DOCTYPE html>
<html lang="en">
<head><title>update-ok</title>
</head>
<body></body>
</html>

<?php
  include_once "db.php";
  include_once "check.php";
  $num = $_GET['num'];
  $title = $_POST['title'];
  $category = $_POST['category'];
  $thumbnail = $_FILES['thumbnail'];
  $projectIntro = $_POST['projectIntro'];
  $contents = $_POST['contents'];
  $dateStart = $_POST['dateStart'];
  $dateEnd = $_POST['dateEnd'];

  $fileName = $thumbnail['name'];
  $tmpName = $thumbnail['tmp_name'];

  if(!empty($fileName)){
    echo $fileName;
    $query = "SELECT * FROM works WHERE num='$num'";
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);

    @unlink('./files/'.$row['thumbnail']);
    move_uploaded_file($tmpName,'./files/'.$fileName);

    $query = "UPDATE works 
    SET thumbnail='$fileName' 
    WHERE num='$num'";
    mysqli_query($connect,$query);
  }
  echo "파일이 없습니다.";
  $query = "UPDATE works SET
  title='$title',
  category='$category',
  projectIntro='$projectIntro',
  contents='$contents',
  dateStart='$dateStart',
  dateEnd='$dateEnd'
  WHERE num='$num'";

  echo $projectIntro;
  mysqli_query($connect,$query);
?>

<style>
body{background:#000; color:#fff;}
</style>

<script>
  location.href='portfolio-list.php';
</script>