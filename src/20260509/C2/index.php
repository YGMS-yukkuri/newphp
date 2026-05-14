<?php 
$ok = false;
 if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if($_POST["age"] < 18) {
        header("Location:". "https://google.co.jp");
    };
    if ($_POST["age"] >= 18) {
        header("Location:". "welcome.php");
    };
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

    <form method="POST">
        <label for="age">年齢</label>
        <input type="number" name="age" id="age">
        <button type="submit">認証</button>
    </form>
</body>
</html>