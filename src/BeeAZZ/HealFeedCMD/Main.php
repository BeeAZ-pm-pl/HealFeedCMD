<?php

namespace BeeAZZ\HealFeedCMD;

use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Server;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{
  
   public function onEnable(): void{
   $this->getServer()->getLogger()->Info("Plugin HealFeedCMD Enable");
   $this->saveDefaultConfig();
   }

   public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool{
   if($sender instanceof Player){
   if($sender->hasPermission("heal.command")){
   if($cmd->getName() == "heal"){
   $sender->setHealth($sender->getMaxHealth());
   $sender->sendMessage($this->getConfig()->get("HEALMESSAGE"));
                }
            }
   if($sender->hasPermission("feed.command")){
   if($cmd->getName() == "feed"){
   $sender->getHungerManager()->setFood(20);
   $sender->getHungerManager()->setSaturation(20);
   $sender->sendMessage($this->getConfig()->get("FEEDMESSAGE"));
                }
            }
        }
        return true;
    }
}
