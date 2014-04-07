<?php

class Debug
{
  private static $debugMode = false;

  public static function debugModeOn()
  {
    self::$debugMode = true;
  }

  public static function debugModeOff()
  {
    self::$debugMode = false;
  }

  public static function showVariable($var)
  {
    if(self::$debugMode)
    {
      echo "\n";
      echo '<pre>';
      htmlspecialchars(print_r($var), ENT_QUOTES);
      echo '</pre>';
      echo "\n";
    }
  }
}

?>