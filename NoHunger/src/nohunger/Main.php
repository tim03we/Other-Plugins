<?php

namespace tim03we\nohunger;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerExhaustEvent;

use pocketmine\plugin\Plugin;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{

    public function onEnable() {

        $this->getServer()->getPluginManager()->registerEvents($this, $this);

    }

    public function Hunger(PlayerExhaustEvent $exhaustEvent) {

        $exhaustEvent->setCancelled(true);

    }

}

