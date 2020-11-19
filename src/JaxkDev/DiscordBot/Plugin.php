<?php
/*
 * DiscordBot, PocketMine-MP Plugin.
 *
 * Licensed under the Open Software License version 3.0 (OSL-3.0)
 * Copyright (C) 2020 JaxkDev
 *
 * Twitter :: @JaxkDev
 * Discord :: JaxkDev#2698
 * Email   :: JaxkDev@gmail.com
 */

namespace JaxkDev\DiscordBot;

use pocketmine\plugin\PluginBase;

class Plugin extends PluginBase {
	/**
	 * @var BotThread
	 */
	private $discordBot;

	public function onEnable() {
		$this->getLogger()->debug("Starting DiscordBot Thread...");
		$this->discordBot = new BotThread($this->getServer()->getLogger());
	}

	public function onDisable() {
		if($this->discordBot->isStarted() and !$this->discordBot->isStopping()){
			$this->discordBot->stop();
		}
	}
}