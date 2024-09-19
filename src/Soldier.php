<?php

namespace Styde;

class Soldier extends Unit{

	protected $damage = 40;

	public function __construct($name)
	{
		parent::__construct($name);
	}

	public function attack(Unit $opponent)
	{
		show("{$this->name} ataca con la espada a {$opponent->getName()}");

		$damage = $this->calculateDamage($this->damage);

		$opponent->takeDamage($damage);
	}
}