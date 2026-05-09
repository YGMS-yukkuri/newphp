<?php
// ファイル操作のための簡易ファイルエクスプローラー

// ドキュメントルートを取得
$doc_root = realpath('./');

// 現在のディレクトリを取得（パラメータで指定されていない場合は現在のディレクトリ）
$current_dir = isset($_GET['dir']) ? $_GET['dir'] : './';

// 相対パスの場合はドキュメントルートからのパスに変換
if (strpos($current_dir, $doc_root) !== 0 && $current_dir !== './') {
  $current_dir = $doc_root . '/' . ltrim($current_dir, '/');
}

// ディレクトリのトラバーサル攻撃を防止
$current_dir = realpath($current_dir) ? realpath($current_dir) : './';

// 許可されたルートディレクトリ外へのアクセス防止
$root_dir = $doc_root;
if (strpos($current_dir, $root_dir) !== 0) {
  $current_dir = $root_dir;
}

// パスを整形
$current_dir = rtrim($current_dir, '/') . '/';

// ドキュメントルートからの相対パスを作成
$relative_path = str_replace($doc_root, '', $current_dir);
if (empty($relative_path)) {
  $display_path = '/';
} else {
  $display_path = '/' . $relative_path;
}

// ファイル表示の処理
$file_to_display = isset($_GET['file']) ? $_GET['file'] : '';
if ($file_to_display) {
  // 相対パスの場合はドキュメントルートからのパスに変換
  if (strpos($file_to_display, $doc_root) !== 0) {
    $file_to_display = $doc_root . '/' . ltrim($file_to_display, '/');
  }

  if (file_exists($file_to_display) && is_file($file_to_display)) {
    // ファイルがドキュメントルート内にあるかチェック
    if (strpos(realpath($file_to_display), $doc_root) === 0) {
      $relative_file_path = str_replace($doc_root . '/', '', $file_to_display);
      // ファイルを直接ブラウザで開くためにリダイレクト
      header('Location: /' . $relative_file_path);
      exit;
    }
  }
}

// ファイルとディレクトリの一覧を取得
$items = scandir($current_dir);
$directories = [];
$files = [];

// ファイルとディレクトリを分ける
foreach ($items as $item) {
  if ($item == '.' || $item == '..') {
    continue;
  }

  $path = $current_dir . $item;
  if (is_dir($path)) {
    $directories[] = [
      'name' => $item,
      'path' => $path,
      'modified' => date('Y-m-d H:i:s', filemtime($path))
    ];
  } else {
    $files[] = [
      'name' => $item,
      'path' => $path,
      'size' => filesize($path),
      'modified' => date('Y-m-d H:i:s', filemtime($path)),
      'ext' => pathinfo($path, PATHINFO_EXTENSION)
    ];
  }
}

// 親ディレクトリへのパスを取得
$parent_dir = dirname($current_dir);
// 親ディレクトリがドキュメントルート外の場合は、ルートディレクトリにする
if (strpos($parent_dir, $doc_root) !== 0) {
  $parent_dir = $doc_root;
}

// MIMEタイプを取得する関数
function getMimeType($ext) {
  $mime_types = [
    'txt' => 'text/plain',
    'htm' => 'text/html',
    'html' => 'text/html',
    'php' => 'text/html',
    'css' => 'text/css',
    'js' => 'application/javascript',
    'json' => 'application/json',
    'xml' => 'application/xml',
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'gif' => 'image/gif',
    'pdf' => 'application/pdf',
    'doc' => 'application/msword',
    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'xls' => 'application/vnd.ms-excel',
    'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
  ];
  
  return isset($mime_types[$ext]) ? $mime_types[$ext] : 'application/octet-stream';
}

// テキストファイルかどうかを判定する関数
function isTextFile($ext) {
  $text_exts = ['txt', 'htm', 'html', 'php', 'css', 'js', 'json', 'xml', 'md', 'ini', 'conf', 'log', 'sql', 'yml', 'yaml'];
  return in_array(strtolower($ext), $text_exts);
}

// ファイルサイズを人が読みやすい形式に変換する関数
function formatFileSize($bytes) {
  $units = ['B', 'KB', 'MB', 'GB', 'TB'];
  $i = 0;
  while ($bytes >= 1024 && $i < count($units) - 1) {
    $bytes /= 1024;
    $i++;
  }
  return round($bytes, 2) . ' ' . $units[$i];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ファイルエクスプローラー</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    h1 {
      color: #333;
    }

    .path {
      background-color: #f5f5f5;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 4px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    a {
      text-decoration: none;
      color: #0066cc;
    }

    a:hover {
      text-decoration: underline;
    }

    .size {
      text-align: right;
    }

    .icon {
      width: 20px;
      margin-right: 5px;
    }

    .file-content {
      background-color: #f5f5f5;
      padding: 15px;
      border-radius: 4px;
      margin-top: 20px;
      overflow-x: auto;
      white-space: pre-wrap;
      word-wrap: break-word;
      border: 1px solid #ddd;
    }

    .file-actions {
      margin: 10px 0;
    }

    .back-button {
      margin-bottom: 10px;
      display: inline-block;
      padding: 5px 10px;
      background-color: #f2f2f2;
      border-radius: 4px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>ファイルエクスプローラー</h1>

    <div class="path">
      現在のディレクトリ: <?php echo htmlspecialchars($display_path); ?>
    </div>

    <?php if ($file_to_display && file_exists($file_to_display)): ?>
      <div class="file-view">
        <div class="back-button">
          <a href="?dir=<?php echo urlencode(str_replace($doc_root, '', dirname($file_to_display))); ?>">ディレクトリに戻る</a>
        </div>
        <h2>ファイル: <?php echo htmlspecialchars(basename($file_to_display)); ?></h2>
        
        <div class="file-actions">
          <a href="<?php echo htmlspecialchars(str_replace($doc_root, '', $file_to_display)); ?>" target="_blank">新しいウィンドウで開く</a>
        </div>
      </div>
    <?php else: ?>

      <table>
        <thead>
          <tr>
            <th>名前</th>
            <th>サイズ</th>
            <th>更新日時</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($current_dir != $root_dir): ?>
            <tr>
              <td>
                <a href="?dir=<?php echo urlencode(str_replace($doc_root, '', $parent_dir)); ?>">
                  ../ (親ディレクトリ)
                </a>
              </td>
              <td></td>
              <td></td>
            </tr>
          <?php endif; ?>

          <?php foreach ($directories as $directory): ?>
            <tr>
              <td>
                <a href="?dir=<?php echo urlencode(str_replace($doc_root, '', $directory['path'])); ?>">
                  📁 <?php echo htmlspecialchars($directory['name']); ?>
                </a>
              </td>
              <td class="size">-</td>
              <td><?php echo $directory['modified']; ?></td>
            </tr>
          <?php endforeach; ?>

          <?php foreach ($files as $file): ?>
            <tr>
              <td>
                <a href="?file=<?php echo urlencode(str_replace($doc_root, '', $file['path'])); ?>">
                  📄 <?php echo htmlspecialchars($file['name']); ?>
                </a>
              </td>
              <td class="size"><?php echo formatFileSize($file['size']); ?></td>
              <td><?php echo $file['modified']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    <?php endif; ?>
  </div>
</body>

</html>