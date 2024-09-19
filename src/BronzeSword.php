<?php

namespace Styde;

class BronzeSword implements Sword
{
	public function doneDamage($damage){
		return $damage * 2;
	}
}
