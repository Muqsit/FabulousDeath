<?php
namespace Muqsit\FabulousDeath;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\Listener;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\entity\Entity;

class fabworks extends PluginBase implements Listener
{

  public function onEnable(){
  $this->getServer()->getPluginManager()->registerEvents($this, $this);
  $this->getLogger()->info("Lightning Strikes loaded!");
}


  public function onDeath(PlayerDeathEvent $e)
  {
    $p = $e->getPlayer();
    $light = new AddEntityPacket();
    $light->type = 93;
    $light->eid = Entity::$entityCount++;
    $light->metadata = array();
    $light->speedX = 0;
    $light->speedY = 0;
    $light->speedZ = 0;
    $light->x = $p->x;
    $light->y = $p->y;
    $light->z = $p->z;
    $p->dataPacket($light);
  }
}  
