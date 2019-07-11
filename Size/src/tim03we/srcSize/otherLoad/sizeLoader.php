<?php
namespace tim03we\srcSize\otherLoad;

use tim03we\srcSize\Main;
use pocketmine\command\PluginCommand;
use pocketmine\plugin\Plugin;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class sizeLoader extends PluginCommand
{

    public function __construct(Plugin $plugin)
    {
        parent::__construct("size", $plugin);
        $this->setDescription('Ändere deine Größe.');
        $this->setUsage('/size <0.1-10>');
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
         if ($sender instanceof Player) 
        {
            if ($sender->hasPermission('player.size'))
             {
                if (count($args) == 1) 
                {
                    if (is_numeric($args[0]))
                    {
                        if ($args[0] >= 0.1 && $args[0] <= 10)
                        {
                            $sender->setScale($args[0]);
                            $sender->sendMessage(loader::PREFIX.'§7Deine Size Größe ist jetzt auf §6'.$args[0]);
                        }
                    }
                    elseif (strtolower($args[0]) == 'about')
                    {
                        $sender->sendMessage(loader::PREFIX.'§7Das Sizer Plugin wurde von §6tim03we §7erstellt!');
                    }
                    elseif (strtolower($args[0]) == 'reset')
                    {
                        $sender->setScale(1);
                        $sender->sendMessage(loader::PREFIX.'§7Deine Größe wurde zurückgesetzt!');
                    }
                    else
                    {
                        $sender->sendMessage(loader::PREFIX.'§cDu musst deine §6Size §cGröße auswählen!');
                    }
                }
                else
                {
                    $sender->sendMessage(loader::PREFIX.'§7Benutze: /size§6 <0.1-10>');
                }
            }
            else
            {
                $sender->sendMessage(loader::PREFIX.'§cDu darfst diesen Befehl nicht ausführen!');
            }
        }
        else
        {
            $sender->sendMessage(loader::PREFIX.loader::CONSOLE_SENDER);
        }
    }
}
