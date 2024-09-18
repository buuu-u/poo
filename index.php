<?php

function show($message){
	echo "<p>$message</p>";
}

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
		if ($this->sword) {
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

class Archer extends Unit{

	protected $damage = 20;

	public function attack(Unit $opponent)
	{
		show("{$this->name} disparo una flecha a {$opponent->getName()}");

		$damage = $this->calculateDamage($this->damage);

		$opponent->takeDamage($damage);
	}
}

interface Armor{
	public function absorbDamage($damage);
}

class BronzeArmor implements Armor{
	public function absorbDamage($damage)
	{
		return $damage / 2;
	}
}

class SilverArmor implements Armor{
	public function absorbDamage($damage)
	{
		return $damage / 3;
	}
}

class CursedArmor implements Armor{
	public function absorbDamage($damage)
	{
		return $damage * 2;
	}
}

class EvasedArmor implements Armor{
	public function absorbDamage($damage)
	{	
		return rand(0,1) ? 0 : $damage;
	}
}

interface Sword{
	public function doneDamage($damage);
}

class BronzeSword implements Sword{
	public function doneDamage($damage){
		return $damage * 2;
	}
}

class SilverSword implements Sword{
	public function doneDamage($damage){
		return $damage * 3;
	}
}

$ramm = new Soldier("Ramm");
$silence = new Archer("Silence");

$silence->attack($ramm);

$ramm->setArmor(new BronzeArmor);

$silence->setArmor(new EvasedArmor);

$silence->attack($ramm);

$ramm->attack($silence);