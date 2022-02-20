<?php

namespace GamerMJay\AdvancedHeal;

#pocketmine
use GamerMJay\AdvancedHeal\commands\heal;
use GamerMJay\AdvancedHeal\commands\feed;
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
        $this->config = new Config($this->getDataFolder() . "config.yml", 2);
        $this->getServer()->getCommandMap()->register("gm0", new gm0($this));
        $this->getServer()->getCommandMap()->register("gm1", new gm1($this));
    }
}
