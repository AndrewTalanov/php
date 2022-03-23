<?php
  require_once('bootstrap.php');
  $links = Layout::getInstance();

  // Если для страницы понадобится другая статика, то можно передать название нужной папки в метод
  // $links->setCss('css_test');

  // Если такой папки нет, то подключится статика по умолчанию
  // $links->setCss('css_testt');

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    $links->getFont("Red Hat Mono", 400);
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