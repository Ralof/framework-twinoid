<?php

/*
  Classe parente d'un API

  Stocke le token et gère les requêtes JSON et les erreurs liées.

  /!\ Attention, cette classe ne peut pas être instanciée. Elle sert seulement de classe parente pour de futurs API /!\
*/
abstract class API
{
  protected $_token;                    //Token de connexion
  protected $_errors;                   //Erreurs recontrées
  protected $_errorsDescriptions;       //Descriptions des erreurs rencontrées
  protected $_available;                //Booléen si l'API est disponible
  protected $_numberCalls;              //Nombre de requêtes passées à l'API

  //Constructeur à partir d'un token
  public function __construct($token)
  {
    $this->_token = $token;
    $this->_errors = null;
    $this->_errorsDescriptions = null;
    $this->_available = true;
    $this->_numberCalls = 0;
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

  //Retourne le nombre de requêtes qui ont été effectuées vers l'API
  public function getNumberCalls()
  {
    return $this->_numberCalls;
  }

  //Effectue une requête JSON
  protected function jsonCall($url)
  {
    $json = file_get_contents($url);
    $json = json_decode($json);

    if(property_exists($json, 'error'))
    {
      $this->_errors[] = $json->error;
      $this->_errorsDescriptions[] = $json->error_description;

      if($json->error == "server_error")
      {
        $this->_available = false;
      }
    }

    ++$this->_numberCalls;

    return $json;
  }
}
?>