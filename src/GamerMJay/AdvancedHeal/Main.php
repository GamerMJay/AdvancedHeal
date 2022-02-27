<?php

namespace GamerMJay\AdvancedHeal;

#pocketmine
use GamerMJay\AdvancedHeal\commands\feed;
use GamerMJay\AdvancedHeal\commands\heal;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\tile\Tile;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\player\Player;

class Main extends PluginBase {
    public $config;

    public function onEnable(): void {
        $this->saveResource("config.yml");
        $this->getServer()->getCommandMap()->register("feed", new feed($this));
        $this->getServer()->getCommandMap()->register("heal", new heal($this));
    }
}