<?php

namespace Styde\Weapons;

use Styde\Weapon;
use Styde\Unit;

class FireBow extends Weapon
{
	protected $damage = 30;
	protected $magical = true;
	protected $description = ":Unit dispara una flecha de fuego a :opponent";
}