<?php 
session_start();

$number = 0;

if(isset($_SESSION["count"])) {
    $number = $_SESSION["count"];
};

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if($_POST["asdf"] === "plus") {
        $number = $number + 1;
    } else {
        $number = $number - 1;
    };
    $_SESSION["count"] = $number;
    header("Location:". $_SERVER["PHP_SELF"]);
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
        <input type="text" style="display:none" name="asdf" value="plus">
        <button type="submit">+</button>
    </form>
    
    <h2><?php echo($number) ?></h2>

    <form method="post">
        <input type="text" style="display:none" name="asdf" value="min">
        <button type="submit">-</button>
    </form>
</body>
</html>