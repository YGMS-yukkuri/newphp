<?php 
$jsonfile = file_get_contents("bbs.json");
$json = json_decode($jsonfile,true);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tbody {
            display:flex;
            flex-direction: column-reverse;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" id="">
        <input type="text" name="body">
        <button type="submit">送信</button>
    </form>
    <h1>投稿一覧</h1>
    <table>
        <?php foreach ($json as $key => $value) {
            echo("<tr>");
             foreach ($value as $key => $value2) {
                echo("<td>".$value2."</td>");
             };
            echo("</tr>");
        }
        ?>
    </table>
</body>
</html>