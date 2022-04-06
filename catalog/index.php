<?php

  $data = [
    [
      'title' => 'Tovar 1', 
    ],
    [
      'title' => 'Tovar 2', 
    ],
    [
      'title' => 'Tovar 3', 
    ],
    [
      'title' => 'Tovar 4', 
    ],
    [
      'title' => 'Tovar 5', 
    ],
  ];
?>

<?php foreach($data as $item):
  $title = $item['title']; ?>

  <div class='catalog-item'>
    <h2 class='catalog-title'><?= $title ?></h2>
    <div class='catalog-func'>
      <a href='#' class='catalog-func-buy catalog-func-item'>В корзину</a>
      <a href='#' class='catalog-func-favor catalog-func-item'>В избранное</a>
    </div>
  </div>
  
<?php endforeach; ?>