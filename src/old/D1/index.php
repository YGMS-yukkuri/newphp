<?php

$lower = isset($_GET['lower']) && is_numeric($_GET['lower']) ? (int)$_GET['lower'] : null;
$upper = isset($_GET['upper']) && is_numeric($_GET['upper']) ? (int)$_GET['upper'] : null;
$json = file_get_contents(__DIR__ . '/data.json');
$data = json_decode($json, true);

if ($lower !== null && $upper !== null) {
  $data = array_filter($data, function ($item) use ($lower, $upper) {
    return $item['price'] >= $lower && $item['price'] <= $upper;
  });
} elseif ($lower !== null) {
  $data = array_filter($data, function ($item) use ($lower) {
    return $item['price'] >= $lower;
  });
} elseif ($upper !== null) {
  $data = array_filter($data, function ($item) use ($upper) {
    return $item['price'] <= $upper;
  });
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>D1</title>
</head>

<body>
  <form action="" method="get">
    <div>
      下限: <input type="number" name="lower" id="lower" value="">
    </div>
    <div>
      上限: <input type="number" name="upper" id="upper" value="">
    </div>
    <div>
      <button>絞り込み</button>
    </div>
  </form>
  <table border="1">
    <thead>
      <tr>
        <th>name</th>
        <th>price</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $item) : ?>
        <tr>
          <td><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></td>
          <td><?= htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>