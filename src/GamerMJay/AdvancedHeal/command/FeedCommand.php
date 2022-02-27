<?php

namespace GamerMJay\AdvancedHeal\command;

use GamerMJay\AdvancedHeal\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class FeedCommand extends Command {

    private Main $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
		parent::__construct($this->plugin->config->get("feed"), $this->plugin->getConfig()->get("feed-description"));
        $this->setPermission("feed.use");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if(!$sender instanceof Player) {
            $sender->sendMessage($this->plugin->config->get("run-ingame"));
            return false;
        }
        $this->testPermission($sender);
        $sender->getHungerManager()->setFood(20);
        $sender->getHungerManager()->setSaturation(20);
        $sender->sendMessage($this->plugin->config->get("feed-message"));
        return true;
    }
}