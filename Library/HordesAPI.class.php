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

  //Récupère les informations sur l'utilisateur actuellement connecté, mais non incarné
  public function getMeBasicsInfos($fields = "name,twinId,avatar,playedMaps")
  {
    $url = "http://www.hordes.fr/tid/graph/me?fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations sur un utilisateur X
  public function getUser($user, $fields = "name,twinId,mapId,map,avatar,hero,dead,job,out,baseDef,ban,x,y,playedMaps")
  {
    $url = "http://www.hordes.fr/tid/graph/user?uid=".$user."&fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations sur un utilisateur Twinoid X
  public function getTwinUser($twinUser, $fields = "name,twinId,mapId,map,avatar,hero,dead,job,out,baseDef,ban,x,y,playedMaps")
  {
    $url = "http://www.hordes.fr/tid/graph/twinUser?twinid=".$twinUser."&fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations d'une ville
  public function getMap($mapId, $fields = "zones,citizens,city,cadavers,expeditions")
  {
    $url = "http://www.hordes.fr/tid/graph/map?mapId=".$mapId."&fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }
}

?>