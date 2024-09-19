<?php

namespace Styde\Weapons;

use Styde\Weapon;
use Styde\Unit;

class BasicBow extends Weapon
{
	protected $damage = 20;
	protected $description = ":Unit dispara una flecha a :opponent";
}