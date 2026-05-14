<?php 
session_start();

$number = 0;
$number2 = 0;
$number3 = 0;

if(isset($_SESSION["count"])) {
    $number = $_SESSION["count"];
};
if(isset($_SESSION["count2"])) {
    $number2 = $_SESSION["count2"];
};
if(isset($_SESSION["count3"])) {
    $number3 = $_SESSION["count3"];
};

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST["asdf"]) && $_POST["asdf"] === "plus") {
        $number = $number + 1;
        $_SESSION["count"] = $number;
    } else if(isset($_POST["asdf"]) && $_POST["asdf"] === "min") {
        $number = $number - 1;
        $_SESSION["count"] = $number;
    };

    if(isset($_POST["asdf2"]) && $_POST["asdf2"] === "plus") {
        $number2 = $number2 + 1;
        $_SESSION["count2"] = $number2;
    } else if(isset($_POST["asdf2"]) && $_POST["asdf2"] === "min"){
        $number2 = $number2 - 1;
        $_SESSION["count2"] = $number2;
    };
    
    if(isset($_POST["asdf3"]) && $_POST["asdf3"] === "plus") {
        $number3 = $number3 + 1;
        $_SESSION["count3"] = $number3;
    } else if(isset($_POST["asdf3"]) && $_POST["asdf3"] === "min"){
        $number3 = $number3 - 1;
        $_SESSION["count3"] = $number3;
    };
    
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

    <form method="post">
        <input type="text" style="display:none" name="asdf2" value="plus">
        <button type="submit">+</button>
    </form>
    
    <h2><?php echo($number2) ?></h2>

    <form method="post">
        <input type="text" style="display:none" name="asdf2" value="min">
        <button type="submit">-</button>
    </form>

    <form method="post">
        <input type="text" style="display:none" name="asdf3" value="plus">
        <button type="submit">+</button>
    </form>
    
    <h2><?php echo($number3) ?></h2>

    <form method="post">
        <input type="text" style="display:none" name="asdf3" value="min">
        <button type="submit">-</button>
    </form>
</body>
</html>