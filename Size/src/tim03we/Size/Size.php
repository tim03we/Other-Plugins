<?php
namespace tim03we\Size;

use tim03we\Size\otherLoad\cmdLoader;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{

const PREFIX = '§l§6Sizer §8»§r ';
const CONSOLE_SENDER = '§4Du musst diesen Befehl In-Game ausführen!';
    
    public function onEnable()
    {
           commandloader::registerAll($this);
        
        $this->getLogger()->info("§aSize wurde aktiviert!");
    }

    public function onDisable()
    {
        $this->getLogger()->info("§4Size wurde deaktiviert!");
    }

    
}
