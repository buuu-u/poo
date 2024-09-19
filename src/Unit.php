<?php

namespace Styde;

class Unit{

	protected int $hp=40;
	protected $armor;
	protected $weapon;

	public function __construct(protected string $name, Weapon $weapon)
	{
		$this->weapon = $weapon;
		$this->armor = new Armors\MissingArmor();
	}

	public function getName()
	{
		return $this->name;
	}

	public function getHp()
	{
		return $this->hp;
	}

	public function move($direction)
	{
		show("{$this->name} se mueve direccion $direction");
	}

	public function attack(Unit $opponent)
	{
		$attack = $this->weapon->createAttack();

		show($attack->getDescription($this, $opponent));

		$opponent->takeDamage($attack);
	}

	public function takeDamage(Attack $attack)
	{
		$this->hp = $this->hp - $this->armor->absorbDamage($attack);

		if ($this->hp < 0) {
			$this->hp = 0;
		}

		show("{$this->name} ahora tiene {$this->hp} puntos de vida");
		
		if ($this->hp <= 0){
			$this->die();
			exit();
		}
	}

	public function die()
	{
		show("{$this->name} muere");
	}

	public function setArmor(Armor $armor = null)
	{
		$this->armor = $armor;
	}

	public function setWeapon(Weapon $weapon)
	{
		$this->weapon = $weapon;
	}
}
