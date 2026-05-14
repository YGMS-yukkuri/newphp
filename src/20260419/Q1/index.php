<?php 
if(isset($_GET["min"]) && isset($_GET["max"])) {
    $min = (int)$_GET["min"];
    $max = (int)$_GET["max"];
    
    echo("<ul>");
    for ($i = $min; $i <= $max ; $i++) { 
        echo("<li>");
        echo($i);
        echo("</li>");    
    };
    echo("</ul>");
} else {
    echo("パラメータが不正です");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>