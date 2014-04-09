<?php

/*
  Classe statique s'occupant de la gestion de la session. (Facultative)

  /!\ Attention, cette classe ne peut pas être instanciée. /!\
*/

Abstract class SessionManager
{
  
  //Retourne si l'utilisateur est connecté
  public static function isConnected()
  {
    return (isset($_SESSION['authTwinoid']));
  }

  //Redirection vers l'authentification Twinoid
  public static function tryConnection()
  {
    header("Location: https://twinoid.com/oauth/auth?response_type=code&client_id=".CLIENT_ID."&redirect_uri=".REDIRECT_URI."&scope=".SCOPE."&state=connexion");
  }

  //Tentative d'authentification à partir du code reçu
  public static function getConnection($code)
  {
    $authTwinoid = new AuthTwinoid(CLIENT_ID, CLIENT_SECRET, REDIRECT_URI);
    $authTwinoid->initialize($code);

    //Vérification simple si l'authentification est réussie
    if(!($authTwinoid->getErrors()))
    {
     $_SESSION['authTwinoid'] = $authTwinoid;
     header("Location: " .REDIRECT_URI);
    }
  }

  //Authentification du client
  public static function createConnection()
  {
    if(!self::isConnected())
    {
      if(!isset($_GET['code']))
      {
        self::tryConnection();
      }
      else
      {
        self::getConnection($_GET['code']);
      }
    }
    else
    {
      self::refresh();
    }
  }

  //Suppression de la session en cours (Déconnexion)
  public static function deleteConnection()
  {
    $_SESSION['authTwinoid'] = null;
  }

  public static function refresh()
  {
    if(self::isConnected())
    {
      if($_SESSION['authTwinoid']->isExpired())
      {
        self::deleteConnection();
        self::createConnection();
      }
    }
  }
}

?>