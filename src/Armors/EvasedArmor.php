<?php

namespace Styde\Armors;

use Styde\Armor;
use Styde\Attack;

class EvasedArmor extends Armor
{
	public function absorbDamage(Attack $attack)
	{	
		return rand(0,1) ? 0 : $attack->getDamage();
	}
}