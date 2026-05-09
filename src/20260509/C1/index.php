<?php
if(isset(file_get_contents("bbs.json"))) {
    $json = file_get_contents("bbs.json");
} else {
    $json = [];
}

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["user"];
    $message = $_POST["message"];
    // $time = 現在時刻取得;

    $newarr = [
        "user" => $user,
        "message" => $message
        //"time" => $time
    ];

    $new = json_encode(array_push($json,$newarr),JSON_UNESCAPED_UNICODE);
    file_put_contents("bbs.json",$new);
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
    <form method="post">

    </form>
</body>
</html>