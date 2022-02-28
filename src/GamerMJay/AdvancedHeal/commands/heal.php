<?php

namespace GamerMJay\AdvancedHeal\commands;

use GamerMJay\AdvancedHeal\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginOwned;
use pocketmine\utils\Config;

class heal extends Command implements PluginOwned
{
    public function __construct(Main $plugin)
    {
		$this->plugin = $plugin;
		parent::__construct($this->plugin->getConfig()->get("heal"), $this->plugin->getConfig()->get("description"), "/heal", [""]);
        $this->setPermission("heal.use");
        $this->plugin = $plugin;
    }
    public function execute(CommandSender $player, string $commandLabel, array $args)
    {
        if(!$player instanceof Player){
            $player->sendMessage($this->plugin->getConfig()->get("run-ingame"));
            return false;
        }
        if(!$player->hasPermission("heal.use")){
            $player->sendMessage($this->plugin->getConfig()->get("no-permission"));
            return false;
        }
        $player->setHealth($player->getMaxHealth());
        $player->sendMessage($this->plugin->getConfig()->get("heal-message"));
    }

    public function getOwningPlugin(): Plugin
    {
        return $this->plugin;
    }
}
