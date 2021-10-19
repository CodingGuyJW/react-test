<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload portfolio</title>
</head>
<body>
    <!-- portfolio-upload.php -->
    <?php
        include_once "check.php";
    ?>
    <form action="upload-ok.php" method="post"
        enctype="multipart/form-data">
        <table>
            <caption>Portfolio upload</caption>
            <tr>
                <th>title</th>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <th>category</th>
                <td>
                    <select name="category">
                        <option disabled>select category</option>
                        <option>Responsive web</option>
                        <option>Mobile only</option>
                        <option>PC only</option>
                        <option>Mobile application</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>thumbnail</th>
                <td><input type="file" name="thumbnail"></td>
            </tr>
            <tr>
                <th>projectIntro</th>
                <td><textarea name="projectIntro"></textarea></td>
            </tr>
            <tr>
                <th>contents</th>
                <td><textarea name="contents" id="ir1"></textarea></td>
            </tr>
            <tr>
                <th>dateStart</th>
                <td><input type="date" name="dateStart"></td>
            </tr>
            <tr>
                <th>dateEnd</th>
                <td><input type="date" name="dateEnd"></td>
            </tr>
            <tr>
                <th>action</th>
                <td>
                    <input class="submit-btn" type="submit" value="save">
                    <a class="go-to-list" href="portfolio-list.php">list</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>

<style>
    body{background:#000;color:#fff;}
    table{
        margin:0 auto;
        border-collapse:collapse;
    }
    caption{
        font-size:2em;
        padding:10px;
        background:#aaa; color:#000;
    }
    th,td{
        padding:12px;
        border:0px solid #fff;
        border-width: 1px 0 1px; 
    }
    th{background:#333; width:150px;}
    textarea{width:600px; height:300px;}
    td{width:610px;}
    a{color:#fff;text-decoration:none;}
    .submit-btn{cursor: pointer;}
    .go-to-list{
        background:#eee;
        color:#000;
        text-decoration:none;
        border:0px solid #fff;
        border-radius:2px;
        padding:2px 10px;
        font-size:0.8em; 
        margin-left:10px;
        margin-top:5px;
    }
</style>

<script type="text/javascript" src="./SmartEditor/js/HuskyEZCreator.js" charset="utf-8"></script>

<script type="text/javascript">
    var oEditors = [];
    const btnSubmit = document.querySelector('input[type=submit]');
    
    btnSubmit.onclick = function(e){
        e.preventDefault();
        submitContents(this);
    }

    nhn.husky.EZCreator.createInIFrame({
        oAppRef: oEditors,
        elPlaceHolder: "ir1",
        sSkinURI: "SmartEditor/SmartEditor2Skin.html",	
        htParams : {
            bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
            bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
            bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
            //bSkipXssFilter : true,		// client-side xss filter 무시 여부 (true:사용하지 않음 / 그외:사용)
            //aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
            fOnBeforeUnload : function(){
                //alert("완료!");
            }
        }, //boolean
        fOnAppLoad : function(){
            //예제 코드
            //oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
        },
        fCreator: "createSEditor2"
    });

    function submitContents(elClickedObj) {
        oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
                
        console.log(
            document.getElementById("ir1").value
        )

        try {
            elClickedObj.form.submit();
        } catch(e) {}
    }
</script>
