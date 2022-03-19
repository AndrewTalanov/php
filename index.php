<?php
  require_once('bootstrap.php');
  $links = Layout::getInstance();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    $links->getFont("Roboto", 100, 200, 500, 700);
    $links->getCSS();
  ?>
  <title>Document</title>
</head>
<body>

  <section class="catalog">
    <?php
      require_once('catalog/index.php');
    ?>
  </section>

  <?php
    $links->getJS();
  ?>
</body>
</html>