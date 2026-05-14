<?php 
$pass = 1234;
$checked = false;
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $hashed = password_hash($pass,PASSWORD_DEFAULT);
    $input = $_POST["pass"];
    if(password_verify($input,$hashed)) {
        echo('<h1 style="color:green">一致</h1>');
    } else {
        echo('<h1 style="color:red">不一致</h1>');
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
    <form method="post">
    <label for="">PASSWORD</label>    
    <input type="password" name="pass">
    <button type="submit">ログイン</button>
    </form>
</body>
</html>