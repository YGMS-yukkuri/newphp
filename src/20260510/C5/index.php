<?php 
date_default_timezone_set("Japan");
$filename = "db.json";
if(!file_exists($filename)) {
    file_put_contents($filename,json_encode([]));
    $data = [];
} else {
    $json = file_get_contents($filename);
    $data = json_decode($json,true) ?? [];
};

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["message"])) {
    $message = $_POST["message"];
    $date = date("Y-m-d H:i:s");
    if (isset($data[0]["message"])) {
        $new = $data[array_key_last($data)]["id"] + 1;
    } else {
        $new = 0;
    };

    $data[] = [
        "message"=> $message,
        "date" => $date,
        "id" => $new
    ];

    file_put_contents($filename,json_encode($data));
    header("Location:". $_SERVER["PHP_SELF"]);
};

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["idx"])) {
    $reidx = $_POST["idx"];
    $arrkey = array_search($reidx,array_column($data, "id"));
    unset($data[$arrkey]);
    $data = array_values($data);
    file_put_contents($filename,json_encode($data));
    header("Location:". $_SERVER["PHP_SELF"]);
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="message" id="" required>
        <button type="submit">保存</button>
    </form>
    <? if(isset($data[0]["message"])): ?>
    <table>
        <tr>
            <td>message</td>
            <td>date</td>
        </tr>
        <? foreach ($data as $key => $value): ?>
        <tr>
            <td><?=$value["message"]?></td>
            <td><?=$value["date"]?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="idx" value="<?=$value["id"]?>">
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
            <? endforeach ?>
    </table>
    <?endif ?>
</body>
</html>