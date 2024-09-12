<?php

namespace BNTFeujjj\fNoGravity;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockUpdateEvent;
use pocketmine\block\Gravel;
use pocketmine\block\Sand;

class Main extends PluginBase implements Listener {
    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
    }

    public function onUpdate(BlockUpdateEvent $event): void {

        $block = $event->getBlock();
        $config = $this->getConfig();
        if (in_array($block->getPosition()->getWorld()->getFolderName(), $config->get("worlds", []))) {
        if ($config->get("sand", false) && $block instanceof Sand) {
            $event->cancel();
        }
        if ($config->get("gravel", false) && $block instanceof Gravel) {
            $event->cancel();
            }
        }
    }
}
