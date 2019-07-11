<?php

namespace tim03we\repair;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Utils;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecuter;
use pocketmine\commandCommandMap;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\inventory\PlayerInventory;
use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Tool;
use pocketmine\item\Armor;

class Main extends PluginBase implements Listener{
		
		public function onEnable(){
			$this->getServer()->getPluginManager()->registerEvents($this, $this);
		}
		
		public function onCommand(CommandSender $sender, Command $command, $label, array $args): bool {
			switch(strtolower($command->getName())){
			case "repair":
			if($sender instanceof Player){
				$item = $sender->getInventory()->getItemInHand();
				if($item instanceof Armor or $item instanceof Tool){

					$id = $item->getId();
					$meta = $item->getDamage();
					$sender->getInventory()->removeItem(Item::get($id, $meta, 1));

					$newitem = Item::get($id, 0, 1);
					if($item->hasCustomName()){
						$newitem->setCustomName($item->getCustomName());
						}
					if($item->hasEnchantments()){
						foreach($item->getEnchantments() as $enchants){
						$newitem->addEnchantment($enchants);
						}
						}
					$sender->getInventory()->addItem($newitem);
					$sender->sendMessage("§7» §aDas Item§f " . $item->getName() . " §awurde repariert!");
					return true;
					} else {
					$sender->sendMessage("§cDieses Item kann nicht repariert werden!");
					return false;
					}
				} else {
				$sender->sendMessage("InGame Befehl!");
				return false;
				}
				break;
			}
		}
	
	}
