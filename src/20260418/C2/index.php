<?php
if(file_exists("count.txt")) {
  $count = file_get_contents("count.txt");
  $count += 1;
} else {
  $count = 0;
}


  file_put_contents("count.txt", $count)


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>C2</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  現在の訪問回数: <?php echo($count) ?>
</body>
</html>