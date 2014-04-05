<?php

/*
  Classe parente d'un API

  Stocke le token et gère les requêtes JSON et les erreurs liées.

  /!\ Attention, cette classe ne peut pas être instanciée. Elle sert seulement de classe parente pour de futurs API /!\
*/
Abstract class API
{
  protected $_token;                    //Token de connexion
  protected $_errors;                   //Erreurs recontrées
  protected $_errorsDescriptions;       //Descriptions des erreurs rencontrées

  //Constructeur à partir d'un token
  public function __construct($token)
  {
    $this->_token = $token;
    $this->_errors = null;
    $this->_errorsDescriptions = null;
  }

  //Retourne une booléen à savoir s'il y a des erreurs
  public function errors()
  {
    return isset($this->_errors);
  }

  //Retourne les erreurs
  public function getErrors()
  {
    return $this->_errors;
  }

  //Retourne la description des erreurs
  public function getErrorsDescriptions()
  {
    return $this->_errorsDescriptions;
  }

  //Effectue une requête JSON
  protected function jsonCall($url)
  {
    $json = file_get_contents($url);
    $json = json_decode($json);

    if(is_callable($json->error, true))
    {
      $this->_errors[] = $json->error;
      $this->_errorsDescriptions[] = $json->error_description;
    }

    return $json;
  }
}
?>