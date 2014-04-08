<?php

/*
  Classe héritant la classe API

  Récupère les informations sur le jeu Mush
*/
class MushAPI extends API
{
  
  //Récupère les informations de l'utilisateur actuellement connecté
  public function getMe($fields = "creationDate,freeGroupTicket,hero,historyHeroes,historyShips,id,mushXp,myGroups,paidGroupTicket,xp")
  {
    $url = "http://www.mush.vg/tid/graph/me?fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations de l'utilisateur actuellement connecté
  public function getUser($userId, $fields = "historyHeroes,historyShips,id,myGroups")
  {
    $url = "http://www.mush.vg/tid/graph/user/".$userId."?fields=".$fields."&access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations du jeu (data)
  public function getData()
  {
    $url = "http://www.mush.vg/tid/graph/data?access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations concernant le vaisseau du joueur actuel
  public function getCurShip($fields = "armor,counter_exploration,counter_projects,counter_research,creationDate,currentCycle,currentOrientation,dailyOrder,dailyOrderDate,detructionDate,enginePipeline,fuel,group,hp,inConf,o2,season,shield,startDate,triumphRemap")
  {
    $url = "http://www.mush.vg/tid/graph/curShip?access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }

  //Récupère les informations concernant le héros du joueur actuel
  public function getCurHero($fields = "consummedPa,counter_hunterDown,counter_plannerScanned,creationDate,currentPa,dead,heroTriumph,hp,id,isMale,isMush,location,moral,nurture,ship,sporeThisDay,spores,wastedPa")
  {
    $url = "http://www.mush.vg/tid/graph/curHero?access_token=".$this->_token."";
    
    return $this->jsonCall($url);
  }
}

?>