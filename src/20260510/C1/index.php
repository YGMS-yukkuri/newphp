<?php
session_start();
$data1 = "";
$data2 = "";
$data3 = "";

if(isset($_SESSION["data1"])) {
    $data1 = $_SESSION["data1"];
};
if(isset($_SESSION["data2"])) {
    $data2 = $_SESSION["data2"];
};
if(isset($_SESSION["data3"])) {
    $data3 = $_SESSION["data3"];
};

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $data1 = $_POST["data1"];
    $_SESSION["data1"] = $data1;
    header("Location:". $_SERVER["PHP_SELF"]);
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
    <form method="post">
        <input type="text" name="data1" value="<?= $data1 ?>">
        <button type="submit">保存</button>
    </form>
    <ul>
        <li>data1: <?= $data1 ?></li>
        <li>data2: <?= $data2 ?></li>
        <li>data3: <?= $data3 ?></li>
    </ul>
</body>
</html>