<?php

$date = isset($_GET['date']) ? $_GET['date'] : null;

function getWeekOfMonth($dateString) {
  // 日付をDateTimeオブジェクトに変換
  $date = new DateTime($dateString);

  // その月の初日を取得
  $firstDayOfMonth = new DateTime($date->format('Y-m-01'));

  // その月の初日の曜日を取得（0=日曜日, 1=月曜日, ..., 6=土曜日）
  $firstDayOfWeek = (int)$firstDayOfMonth->format('w');

  // 1週目の日数を計算
  $daysInFirstWeek = 7 - $firstDayOfWeek;

  // その日の日付を取得（1-31）
  $day = (int)$date->format('j');

  // 1週目の日数を引いた残りの日数を計算
  $remainingDays = $day - $daysInFirstWeek;
  
  // 残りの日数が0以下の場合は1週目と判定
  if ($remainingDays < 0) {
    return 1;
  }
  
  // 残りの日数を7で割って、1を足すことで週数を計算
  return ceil($remainingDays / 7) + 1;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>D2</title>
</head>

<body>
  <form action="" method="get">
    <input type="date" name="date" value="<?= htmlspecialchars($date, ENT_QUOTES, 'UTF-8') ?>">
    <button>送信</button>
  </form>
  <?php if ($date): ?>
    <h1><?php echo getWeekOfMonth($date) ?>週目</h1>
  <?php endif; ?>
</body>

</html>