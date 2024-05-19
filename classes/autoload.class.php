<?php 
class Autoload {
  public function __construct() {
    $files = scandir(__DIR__ . "/");

    foreach($files AS $file){

      if (!in_array($file, ['.', '..'])){
        include_once $file;
      }
    }
  }
}