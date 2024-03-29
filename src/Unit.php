<?php

namespace Styde;

abstract class Unit{
    protected $hp = 40;
    protected $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function getHp(){
        return $this->hp;
    }

    public function move($direction){
        show("{$this->getName()} se esta moviendo hacia $direction");
    }

    abstract public function attack(Unit $opponent);

    public function takeDamage($damage){

        $this->hp = $this->hp - $this->absorbDamage($damage);

        show("{$this->getName()} ahora tiene {$this->getHp()} puntos de vida");

        if($this->hp <= 0 ){
            $this->die();
        }
    }

    public function die(){
        show("{$this->getName()} Muere");

        exit();
    }

    protected function absorbDamage($damage){
        return $damage;
    }

}