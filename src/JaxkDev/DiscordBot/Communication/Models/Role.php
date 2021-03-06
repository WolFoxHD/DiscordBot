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

namespace JaxkDev\DiscordBot\Communication\Models;

class Role implements \Serializable {

	/** @var string */
	private $id;

	/** @var string */
	private $name;

	/** @var int (Bitwise) */
	private $permissions;

	/** @var int */
	private $colour;

	/** @var int */
	private $hoistedPosition;

	/** @var bool */
	private $mentionable;

	public function getId(): string{
		return $this->id;
	}

	public function setId(string $id): Role{
		$this->id = $id;
		return $this;
	}

	public function getName(): string{
		return $this->name;
	}

	public function setName(string $name): Role{
		$this->name = $name;
		return $this;
	}

	public function getPermissions(): int{
		return $this->permissions;
	}

	public function setPermissions(int $permissions): Role{
		$this->permissions = $permissions;
		return $this;
	}

	public function getColour(): int{
		return $this->colour;
	}

	/**
	 * @param int $colour [0x000000 - 0xFFFFFF]
	 * @return self
	 */
	public function setColour(int $colour): Role{
		$this->colour = $colour;
		return $this;
	}

	/**
	 * @return int [-1 if not hoisted.]
	 */
	public function getHoistedPosition(): int{
		return $this->hoistedPosition;
	}

	public function setHoistedPosition(int $hoistedPosition): Role{
		$this->hoistedPosition = $hoistedPosition;
		return $this;
	}

	public function isMentionable(): bool{
		return $this->mentionable;
	}

	public function setMentionable(bool $mentionable): Role{
		$this->mentionable = $mentionable;
		return $this;
	}

	//----- Serialization -----//

	public function serialize(): ?string{
		return serialize([
			$this->id,
			$this->name,
			$this->colour,
			$this->permissions,
			$this->mentionable,
			$this->hoistedPosition
		]);
	}

	public function unserialize($serialized): void{
		[
			$this->id,
			$this->name,
			$this->colour,
			$this->permissions,
			$this->mentionable,
			$this->hoistedPosition
		] = unserialize($serialized);
	}
}