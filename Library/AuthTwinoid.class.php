<?php

/*
  Classe s'occupant de la récupération du token et de l'authentification Twinoid
*/

class AuthTwinoid
{
  private $_clientId;           //Identifiant de l'application
  private $_clientSecret;       //Clé secrète
  private $_redirectUri;        //URL de redirection
  private $_token;              //Token
  private $_expireTime;         //Timestamp max du token
  private $_errors;             //Erreurs rencontrées
  private $_scope;

  //Constructeur
  public function __construct($clientId, $clientSecret, $redirectUri, $scope = null)
  {
    $this->_clientId = $clientId;
    $this->_clientSecret = $clientSecret;
    $this->_redirectUri = $redirectUri;
    $this->_scope = $scope;
    $this->_token = null;
    $this->_expireTime = null;
    $this->_errors = null;
  }

  //Initialisation de la connexion et récupération du token
  public function initialize($code)
  {
    $url = "https://twinoid.com/oauth/token";

    $contextOptions = array(
            'http' => array(
              'method' => 'POST',
              'header' => 'Content-type: application/x-www-form-urlencoded',
              'content' => "client_id=".$this->_clientId."&client_secret=".$this->_clientSecret."&redirect_uri=".$this->_redirectUri."&code=".$code."&grant_type=authorization_code"
            )
    );

    $context = stream_context_create($contextOptions);
    $json = file_get_contents($url, false, $context);
    $json = json_decode($json);

    $this->_expireTime = time() + $json->expires_in;
    $this->_token = $json->access_token;
  }
  //Accesseur de l'url de redirection
  public function getAuthorizationUri()
  {
    $url = "https://twinoid.com/oauth/auth?response_type=code&client_id=".$this->_clientId."&redirect_uri=".$this->_redirectUri."&state=connexion";
    if ($this->_scope)
    {
      $url .= "&scope=" . $this->_scope;
    }
    return $url;
  }
  //Accesseur du token
  public function getToken()
  {
    return $this->_token;
  }

  //Accesseur de l'erreur
  public function getErrors()
  {
    return $this->_errors;
  }

  //Retourne si le token est expiré
  public function isExpired()
  {
    return time() >= $this->_expireTime;
  }
}

?>