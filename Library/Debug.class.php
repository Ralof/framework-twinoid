<?php

/*
  Classe de débogage
*/
class Debug
{
  private static $debugMode = false;            //Si le framework est en mode débug

  //Active le mode de débogage
  public static function debugModeOn()
  {
    self::$debugMode = true;
  }

  //Désactive le mode de débogage
  public static function debugModeOff()
  {
    self::$debugMode = false;
  }

  //Affiche une variable en mode débogage
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