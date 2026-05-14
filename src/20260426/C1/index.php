<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="inp" id="">
        <button type="submit">カウント</button>
    </form>
    <p>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            echo(strlen($_POST["inp"]) . "文字");
        }
        ?>
    </p>
</body>

</html>