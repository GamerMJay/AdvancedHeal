<?php

namespace GamerMJay\AdvancedHeal\command;

use GamerMJay\AdvancedHeal\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class HealCommand extends Command {

    private Main $plugin;

    public function __construct(Main $plugin) {
		$this->plugin = $plugin;
		parent::__construct($this->plugin->config->get("heal"), $this->plugin->config->get("heal-description"));
        $this->setPermission("heal.use");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if(!$sender instanceof Player) {
            $sender->sendMessage($this->plugin->config->get("run-ingame"));
            return false;
        }
        $this->testPermission($sender);
        $sender->setHealth($sender->getMaxHealth());
        $sender->sendMessage($this->plugin->config->get("heal-message"));
        return true;
    }
}