<?php

class Debug
{
  public static function showVariable($var)
  {
    echo "\n";
    echo '<pre>';
    htmlspecialchars(print_r($var), ENT_QUOTES);
    echo '</pre>';
    echo "\n";
  }
}

?>