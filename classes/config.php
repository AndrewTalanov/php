<?php

  class Config 
  {

    private static $cache = "";

    public static function getFont($file_name, $key) {

      if (!self::$cache) {

        require "./configs/$file_name";
        self::$cache = $configs;
        return self::$cache[$key];

      } else {
        return self::$cache[$key];
      }

    }
  }
?>