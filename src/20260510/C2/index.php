<?php
session_start();
$hash = $_SESSION['hash'] ?? null;
$match = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $pass = $_POST['pass'] ?? '';
        if ($pass !== '') {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $_SESSION['hash'] = $hash;
        }
    } elseif (isset($_POST['verify'])) {
        $vpass = $_POST['vpass'] ?? '';
        if ($vpass !== '' && $hash !== null) {
            $match = password_verify($vpass, $hash);
        } else {
            $match = false;
        }
    }
}
?>
<!-- HTML -->
<form method="post">
    <input type="password" name="pass">
    <button type="submit" name="register">登録</button>
</form>

<form method="post">
    <input type="password" name="vpass">
    <button type="submit" name="verify">検証</button>
</form>

<?php if ($match === true): ?>
    <h2 style="color:green">一致</h2>
<?php elseif ($match === false): ?>
    <h2 style="color:red">不一致</h2>
<?php endif; ?>