<?php

  class Layout
  {
    private static $instance = [];
    private function __construct() {}
    private function __clone() {}
    public function __wakeup() {}

    public static function getInstance(): Layout
    {
        $cls = static::class;
        if (!isset(self::$instance[$cls])) {
            self::$instance[$cls] = new static();
        }

        return self::$instance[$cls];
    }

    // подключение css и js файлов
    private $folders = [
      "css" => "static/css/",
      "js" => "static/js/"
    ];

    private $cssInHtmlTag = "";
    private $jsInHtmlTag = "";

    private function setCSS() {

      $dir = $this->folders["css"];
      $uniq = array_unique(scandir($dir));

      foreach ($uniq as $file) {  
        if (pathinfo($file, PATHINFO_EXTENSION) == 'css') {
          $this->cssInHtmlTag .= "<link rel='stylesheet' href='$dir$file'>";
        }
      }
    }
    private function setJS() {

      $dir = $this->folders["js"];
      $uniq = array_unique(scandir($dir));

      foreach ($uniq as $file) {  
        if (pathinfo($file, PATHINFO_EXTENSION) == 'js') {
          $this->jsInHtmlTag .= "<script src='$dir$file'></script>";
        }
      }
    }

    public function getCSS() {
      if ($this->cssInHtmlTag == "") {
        $this->setCSS();
      }
      echo $this->cssInHtmlTag;
    }
    public function getJS() {
      if ($this->jsInHtmlTag == "") {
        $this->setJS();
      }
      echo $this->jsInHtmlTag;
    }

    // подключение шрифтов
    // сделал еще чтоб размеры можно было указывать любые(почти)
    public function getFont($name, ...$weight) {
      $weight = implode(";", $weight);
      echo "<link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=$name:wght@$weight&display=swap' rel='stylesheet'>";
    }

  }

?>