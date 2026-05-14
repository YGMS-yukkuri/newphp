<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <select name="num" id="">
            <? for ($i = 1; $i < 21; $i++): ?>
                <option value=<?= $i ?>><?= $i ?></option>
            <? endfor ?>
        </select>
        <button type="submit">生成</button>
    </form>
    <table>
        <? if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>

            <? for ($j = 1; $j < 10; $j++): ?>
                <tr>
                    <td><?= $_POST["num"] . "*" . $j ?></td>
                    <td>=</td>
                    <td><?= $_POST["num"] * $j ?></td>
                </tr>
            <? endfor ?>
        <? endif ?>
    </table>
</body>

</html>