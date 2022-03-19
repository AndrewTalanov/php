<?php

  spl_autoload_register(function($class) {

    $class = strtolower($class);

    if (file_exists(__DIR__ . '/classes/' . $class . '.php')) {
      require_once( __DIR__ . '/classes/' . $class . '.php');
    } else {
      echo "Файл $class не найден";
    }

  });  
?>