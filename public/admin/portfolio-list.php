<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>portfolio-list</title>
</head>
<body>
    <!-- portfolio-list.php -->
    <a class="log-out" href="logout.php">log out</a>
    <article>
        <a href="create-table.php">Create table</a>
        <h2>Portfolio list (gallery)</h2>
        <a href="upload-portfolio.php">Upload page</a>
        <ul>
            <?php
                include_once "db.php";
                include_once "check.php";

                $query = "SELECT * FROM works 
                        ORDER BY num DESC";

                $jsonResult = mysqli_query(
                                $connect,$query
                            );
                $array = array();
                while( $row = mysqli_fetch_array($jsonResult)){
                    array_push($array,
                        array(
                            'num'=>$row['num'], 
                            'category'=>$row['category'], 
                            'title'=>$row['title'],
                            'thumbnail'=>$row['thumbnail'],
                            'projectIntro'=>$row['projectIntro'],
                            'contents'=>$row['contents'],
                            'dateStart'=>$row['dateStart'],
                            'dateEnd'=>$row['dateEnd']
                        )
                    );
                }

                // [10,20,30] -> array in php
                // [2=>30,0=>10,1=>20] -> array
                // [a=>30,c=>10,b=>20] -> class X, array in php!
                @mkdir('../data');
                $jsonData = json_encode($array);
                file_put_contents('../data/data.json',$jsonData);

                $result = mysqli_query(
                            $connect,$query
                        );
                while( $row = mysqli_fetch_array($result)){
            ?>
                <li data-num="<?=$row['num']?>">
                    <figcure>
                        <img src="./files/<?=$row['thumbnail']?>" alt="">
                        <figcaption><?=$row['dateStart']?> ~ <?=$row['dateEnd']?></figcaption>
                    </figcure>
                    <p><?=$row['title']?></p>
                    <a href="update-portfolio.php?num=<?=$row['num']?>">edit</a>
                    <a href="delete-portfolio.php?num=<?=$row['num']?>">delete</a>
                </li>
            <? } ?>
        </ul>
    </article>
    <div class="popup">
        <div>
            <!-- contents of clicked thumbnail -->
        </div>
    </div>

</body>
</html>

<style>
    body{background:#000;color:#fff;}
    article{
        width:80%;
        margin:100px auto;
    }
    ul,li{
        padding:0; margin:0;
        list-style:none;
    }
    ul{
        display:flex; 
        justify-content: space-between;
        flex-wrap:wrap;
    }
    li{
        width:48%;
        margin-bottom:50px;
    }
    li img{width:100%;}
    article > a{
        border:1px solid #fff;
        border-radius:10px;
        padding:12px;
        margin:20px 0;
        color:#fff;
        text-decoration:none;
        display: inline-block;
    }
    article ul li a{
        color:#fff;
        text-decoration:none;
        margin-left:100px;
        border:1px solid #fff;
        border-radius:5px;
        padding:5px;
    }
    .popup{
        position:fixed; top:0; left:0;
        width:100%; 
        height:100%;
        background-color:rgba(255,255,255,0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        display:none;
    }
    .popup div{
        background-color:#555;
        padding:100px;
    }
    @media(max-width:1000px){article ul li a{margin-left:70px;}}
    @media(max-width:800px){article ul li a{margin-left:50px;}}
    @media(max-width:650px){article ul li a{margin-left:30px;}}
    @media(max-width:500px){article ul li a{margin-left:10px;}}
    @media(max-width:400px){article ul li a{margin-left:5px;}}
    @media(max-width:320px){article ul li a{margin-left:0.5vw;}}
    @media(max-width:290px){
        article ul li a{display:inline-block; margin-bottom:1vw;}
    }
    .log-out{
        position:fixed;
        top:5%; right:5%;
        color:#fff;
        text-decoration:none;
        padding:10px;
        border:1px solid #fff;
        border-radius:5px;
    }
</style>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script>
    const elLi = document.querySelectorAll('li');
    const elPopup = document.querySelector('.popup');

    elLi.forEach(function(el){
        el.onclick=function(){
            let num = this.dataset.num;
            console.log(num)
            data(num);
            elPopup.style = "display:flex";
        }
    });

    $('.popup').on('click',function(){ $(this).fadeOut(300); })

    function data(n){
        $.ajax({
            url:'data.php',
            data:{'num':n},
            success:function(d){
                const content = elPopup.querySelector('div');
                content.innerHTML = d;
            }
        })
    }
</script>
