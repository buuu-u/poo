<?php

namespace Styde;

class SilverSword implements Sword
{
	public function doneDamage($damage){
		return $damage * 3;
	}
}