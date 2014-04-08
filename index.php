<?php

  include 'Library/autoload.php';                           //Auto chargement des classes
  include 'Config/App.inc.php';                             //Paramètres de l'application

  session_start();                                          //Démarrage de la session

  Debug::debugModeOn();                                     //Activation du mode de déboggage

  //Déconnexion
  if(isset($_GET['reset']))
  {
    SessionManager::deleteConnection();
  }

  //Gestion de la session
  SessionManager::createConnection();
  
  //Application
  if(SessionManager::isConnected())
  {
    echo '<a href="'.REDIRECT_URI.'">Refresh</a> <br />' . "\n";
    echo '<a href="'.REDIRECT_URI.'?reset">Reset</a> <br />' . "\n";

    //Récupération de l'authentification
    $authTwinoid = $_SESSION['authTwinoid'];
    Debug::showVariable($authTwinoid);

    //Gestion de l'API Hordes
    $hordesApi = new HordesAPI($authTwinoid->getToken());
    
    Debug::showVariable($hordesApi->getMe());
    Debug::showVariable($hordesApi->getMap(352736));        //ID de votre ville, seuls les citoyens d'une ville donnée peuvent accéder à leurs informations.

    //Gestion des erreurs
    if($hordesApi->errors())
    {
      $description = $hordesApi->getErrorsDescriptions();

      foreach($hordesApi->getErrors() as $key => $error)
      {
        echo $error . ' : ' . $description[$key] . '<br/>';
      }
    }

    //Gestion de l'API Mush
    $mushApi = new MushAPI($authTwinoid->getToken());
    Debug::showVariable($mushApi->getMe());

    //Gestion des erreurs
    if($mushApi->errors())
    {
      $description = $mushApi->getErrorsDescriptions();

      foreach($mushApi->getErrors() as $key => $error)
      {
        echo $error . ' : ' . $description[$key] . '<br/>';
      }
    }

    //Gestion de l'API Twinoid
    $twinoidApi = new TwinoidAPI($authTwinoid->getToken());
    Debug::showVariable($twinoidApi->getMe());

    //Gestion des erreurs
    if($twinoidApi->errors())
    {
      $description = $twinoidApi->getErrorsDescriptions();

      foreach($twinoidApi->getErrors() as $key => $error)
      {
        echo $error . ' : ' . $description[$key] . '<br/>';
      }
    }

  }
?>