<?php
  //Autoload
  function autoload($class)
  {
    require('Library/'.str_replace('\\', '/', $class).'.class.php');
  }

  spl_autoload_register('autoload');
?>