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

class feed extends Command implements PluginOwned
{
    public function __construct(Main $plugin)
    {
		$this->plugin = $plugin;
		parent::__construct($this->plugin->getConfig()->get("feed"), $this->plugin->getConfig()->get("description2"), "/heal", [""]);
        $this->setPermission("feed.use");
        $this->plugin = $plugin;
    }
    public function execute(CommandSender $player, string $commandLabel, array $args)
    {
        if(!$player instanceof Player){
            $player->sendMessage($config->get("run-ingame"));
            return false;
        }
        if(!$player->hasPermission("feed.use")){
            $player->sendMessage($config->get("no-permission"));
            return false;
        }
        $player->getHungerManager()->setFood(20);
        $player->getHungerManager()->setSaturation(20);
        $player->sendMessage($this->plugin->getConfig()->get("feed-message"));
    }

    public function getOwningPlugin(): Plugin
    {
        return $this->plugin;
    }
}