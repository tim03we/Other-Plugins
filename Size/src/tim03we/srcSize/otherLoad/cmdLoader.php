<?php
namespace tim03we\srcSize\otherLoad;

use tim03we\srcSize\Main;

class cmdLoader
{

    public static function registerAll(loader $plugin)
    {
        $plugin->getServer()->getCommandMap()->register("size", new size($plugin));
    }
}
