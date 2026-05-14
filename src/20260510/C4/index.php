<?php
$page = 1;
if (isset($_GET["page"])) {
    $getnum = (int) $_GET["page"];
    
    if (is_int($getnum)) {
        $page = $getnum;
        if($getnum < 1) {
            $page = 1;
        };
        if($getnum > 10) {
            $page = 10;
        };
    } else {
        $page = 1;
    }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<ul>
    <? for($i=($page*100) - 99; $i <= $page*100; $i++): ?>
        <li><?=$i?></li>
    <? endfor ?>
    <form method="get">
        <input type="hidden" name="page" value="<?=$page + 1?>">
        <button type="submit">次へ</button>
    </form>
    
    <form method="get">
        <input type="hidden" name="page" value="<?=$page - 1?>">
        <button type="submit">前へ</button>
    </form>
</ul>
</body>

</html>