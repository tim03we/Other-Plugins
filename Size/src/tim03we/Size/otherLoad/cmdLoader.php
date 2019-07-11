<?php

namespace tim03we\Size\otherLoad;

use tim03we\Sizer\Size;

class cmdLoader
{

    public static function registerAll(loader $plugin)
    {
        $plugin->getServer()->getCommandMap()->register("size", new size($plugin));
    }
}
