<?php

/*
  Classe héritant la classe API

  Récupère les informations sur le jeu Hordes
*/
class HordesAPI extends API
{
  const URL = "http://www.hordes.fr/tid/graph/";

  //Retourne un booléen si une attaque est en cours
  public function isAttack($update = false)
  {
    if($update == true)
    {
      $url = self::URL."status?access_token=".$this->_token."";
    
      $isAttack = $this->jsonCall($url)->attack;
    }
    else
    {
      $isAttack = !$this->_available;
    }

    return $isAttack;
  }

  //Retourne un booléen si une maintenance est en cours
  public function isMaintenance($update = false)
  {
    if($update == true)
    {
      $url = self::URL."status?access_token=".$this->_token."";
    
      return $this->jsonCall($url)->maintain;
    }
    else
    {
      $isMaintain = !$this->_available;
    }

    return $isMaintain;
  }

  //Retourne un booléen correspondant à la disponibilité de l'API
  public function isAvailable()
  {
    return $this->_available;
  }

  //Récupère les informations sur l'utilisateur actuellement connecté
  public function getMe($fields = "name,twinId,mapId,map,avatar,hero,dead,job,out,baseDef,ban,x,y,playedMaps")
  {
    $url = self::URL."me?fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations sur l'utilisateur actuellement connecté, mais non incarné
  public function getMeBasicsInfos($fields = "name,twinId,avatar,playedMaps")
  {
    $url = self::URL."me?fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations sur un utilisateur X
  public function getUser($user, $fields = "name,twinId,mapId,map,avatar,hero,dead,job,out,baseDef,ban,x,y,playedMaps")
  {
    $url = self::URL."user?uid=".$user."&fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations sur un utilisateur Twinoid X
  public function getTwinUser($twinUser, $fields = "name,twinId,mapId,map,avatar,hero,dead,job,out,baseDef,ban,x,y,playedMaps")
  {
    $url = self::URL."twinUser?twinid=".$twinUser."&fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations d'une ville
  public function getMap($mapId, $fields = "zones,citizens,city,cadavers,expeditions")
  {
    $url = self::URL."map?mapId=".$mapId."&fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }
}

?>