<?php

/*
  Classe héritant la classe API

  Récupère les informations sur le jeu Mush
*/
class TwinoidAPI extends API
{
  const URL = "https://twinoid.com/graph/";

  //Récupère les informations de l'utilisateur actuellement connecté
  public function getMe($fields = "id,name,picture,locale,title,oldNames,sites,like,gender,birthday,city,country,desc,status,contacts,groups,devApps")
  {
    $url = self::URL."me?fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations d'un utilisateur spécifié
  public function getUser($userId, $fields = "id,name,picture,locale,title,oldNames,sites,like,gender,birthday,city,country,desc,status")
  {
    $url = self::URL."user/".$userId."?fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations d'un site par son id
  public function getSiteById($siteId, $fields = "id,name,host,icon,lang,like,infos,me,status")
  {
    $url = self::URL."site/".$siteId."?fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations d'un site par son host
  public function getSiteByHost($host, $fields = "id,name,host,icon,lang,like,infos,me,status")
  {
    $url = self::URL."site?host=".$host."&fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations de like à partir d'un URL
  public function getLike($url, $fields = "url,likes,title")
  {
    $url = self::URL."like?url=".$url."&fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations d'un groupe
  public function getGroup($groupId, $fields = "id,name,link,banner,roles,owner,members,size")
  {
    $url = self::URL."groupe/".$groupId."&fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

}

?>