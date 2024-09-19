<?php

namespace Styde;

class EvasedArmor implements Armor
{
	public function absorbDamage($damage)
	{	
		return rand(0,1) ? 0 : $damage;
	}
}