<?php

namespace tim03we;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerToggleFlightEvent;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat as Color;

class Main extens PluginBase implements Listener{

	public function onEnable(){
    
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
      self::$instance = $this;
		  @mkdir($this->getDataFolder());
		  $this->saveDefaultConfig();
		  }
        
	public function onFlying(PlayerToggleFlightEvent $event) {
    $player = $event->getPlayer();
	  $name = $player->getName();
   
		if ($player->isFlying()) {
			if (!$player->hasPermission("anticheat.fly")) {
     	   
			$player->kick($this->getConfig()->get("kick-reason"), false);
           
			}
		}
	}
}
