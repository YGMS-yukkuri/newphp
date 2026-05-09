<?php
if (file_exists("bbs.json")) {
    $json = file_get_contents("bbs.json");
    $data = json_decode($json, true);
} else {
    $data = null;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["user"];
    $message = $_POST["message"];
    $time = date("Y-m-d H:i:s e");

    $data[] = [
        "user" => $user,
        "message" => $message,
        "time" => $time
    ];

    $new = json_encode($data, JSON_UNESCAPED_UNICODE);
    file_put_contents("bbs.json", $new);
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
        <input type="text" name="user" id="" placeholder="username" required>
        <input type="text" name="message" id="" placeholder="message" required>
        <button type="submit">Submit</button>
    </form>
    <?php if(isset($data)): ?>
        <table>
            <thead>
                <th>NAME</th>
                <th>MESSAGE</th>
                <th>DATE</th>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $value): ?>
                <tr>
                    <td><?echo $value["user"] ?></td>
                    <td><?echo $value["message"]?></td>
                    <td><?echo $value["time"]?></td>
                </tr>
                <? endforeach ?>
            </tbody>
        </table>
    <? endif ?>
             
</body>

</html>