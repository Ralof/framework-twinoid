<?php

/*
  Classe héritant la classe API

  Récupère les informations sur le jeu Hordes
*/
class HordesAPI extends API
{
  //Retourne un booléen si une attaque est en cours
  public function isAttack()
  {
    $url = "http://www.hordes.fr/tid/graph/status?access_token=".$this->_token."";
    
    return $this->jsonCall($url)->attack;
  }

  //Retourne un booléen si une maintenance est en cours
  public function isMaintenance()
  {
    $url = "http://www.hordes.fr/tid/graph/status?access_token=".$this->_token."";
    
    return $this->jsonCall($url)->maintain;
  }

  //Récupère les informations sur l'utilisateur actuellement connecté
  public function getMe($fields = "name,twinId,mapId,map,avatar,hero,dead,job,out,baseDef,ban,x,y,playedMaps")
  {
    $url = "http://www.hordes.fr/tid/graph/me?fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }
}

?>