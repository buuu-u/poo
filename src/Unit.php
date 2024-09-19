<?php

namespace Styde;

abstract class Unit{

	protected int $hp=40;
	protected $armor;
	protected $sword;

	public function __construct(protected string $name)
	{}

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

	abstract public function attack(Unit $opponent);

	public function calculateDamage($damage)
	{
		if ($this -> sword) {
			$damage = $this->sword->doneDamage($damage);
		}
		return $damage;
	}

	public function takeDamage($damage)
	{
		$this->hp = $this->hp - $this->absorbDamage($damage);

		if ($this->hp < 0) {
			$this->hp = 0;
		}

		show("{$this->name} ahora tiene {$this->hp} puntos de vida");
		
		if ($this->hp <= 0){
			$this->die();
			exit();
		}
	}

	protected function absorbDamage($damage)
	{	
		if ($this->armor) {
			$damage = $this->armor->absorbDamage($damage);
		}

		return $damage;
	}

	public function die()
	{
		show("{$this->name} muere");
	}

	public function setArmor(Armor $armor = null)
	{
		$this->armor = $armor;
	}

	public function setSword(Sword $sword = null)
	{
		$this->sword = $sword;
	}
}
