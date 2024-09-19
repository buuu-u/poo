<?php

namespace Styde;

class Attack
{
	public function __construct(protected $damage, protected $magical, protected $description)
	{}

	public function getDescription(Unit $attacker, Unit $opponent)
	{
		return str_replace(
			[':Unit', ':opponent'], 
			[$attacker->getName(), $opponent->getName()], $this->description);
	}

	public function getDamage()
	{
		return $this->damage;
	}

	public function isMagical()
	{
		return $this->magical;
	}

	public function isPhysical()
	{
		return ! $this->isMagical();
	}
}