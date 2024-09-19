<?php

namespace Styde;

class Archer extends Unit
{

	protected $damage = 20;

	public function attack(Unit $opponent)
	{
		show("{$this->name} disparo una flecha a {$opponent->getName()}");

		$damage = $this->calculateDamage($this->damage);

		$opponent->takeDamage($damage);
	}
}