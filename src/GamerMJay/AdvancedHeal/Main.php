<?php

namespace GamerMJay\AdvancedHeal;

use GamerMJay\AdvancedHeal\command\FeedCommand;
use GamerMJay\AdvancedHeal\command\HealCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {

    public Config $config;

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->config = $this->getConfig();
        $this->getServer()->getCommandMap()->register("advancedheal", new FeedCommand($this));
        $this->getServer()->getCommandMap()->register("advancedheal", new HealCommand($this));
    }
}