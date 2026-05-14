<?php 
if(isset($_POST["username"]) || isset($_POST["email"]) || isset($_POST["age"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $age = (int)$_POST["age"];
    } else {
        $username = "";
        $email = "";
        $age = "";
    };
$OKuser = false;
$OKmail = false;
$OKage = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div>

            
            <label for="">username</label>
            <input type="text" name="username" id="" value="<?echo $username ?>" required>
        
        <?php 
        if($_SERVER["REQUEST_METHOD"] === "POST") {
            if(strlen($username) > 20 || strlen($username) <= 0) {
                echo("<p style=color:red>ユーザー名が不正です</p>");
            } else  {
                $OKuser = true;
                }
         }
                ?>
            </div>
<div>

    <label for="">email</label>
    <input type="email" name="email" value="<?echo $email ?>" required>
    
    <?php 
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            echo("<p style=color:red>Emailが不正です</p>");
            } else {
                $OKmail = true;
                }
    }    git push -u origin main
                ?>
    </div>
<div>

    <label for="">age</label>
    <input type="number" name="age" value="<?echo $age ?>" required>
    
</div>
    <?php 
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        if($age >= 120 || $age < 0) {
            echo("<p style=color:red>年齢が不正です</p>");
        } else {
            $OKage = true;
            };
    }
            ?>
    <button type="submit">送信</button>
</form>

<?php
if($OKage && $OKmail && $OKuser) {
    echo("送信完了".$username."さん".$email."年齢".$age."歳");
};

?>
</body>
</html>