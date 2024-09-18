<?php

class Person{

	protected int $changeNickname;
	protected string $nickname;
	public function __construct(
		protected string $firstName, 
		protected string $lastName,
		protected int $birthDate)
	{
	}

	public function getFirstName()
	{
		return $this->firstName;
	}

	public function setFirstName(string $firstname)
	{
		$this->firstName = $firstname;
		return $this;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function setLastName(string $lastname)
	{	
		$this->lastName = $lastname;
		return $this;
	}

	public function getNickname()
	{
		if(!empty($this->nickname)){
			return $this->nickname;
		} else {
			return "Sin nickname";
		}
	}

	public function setNickname(string $nickname)
	{
    	if (strlen($nickname) > 2 && $nickname !== $this->firstName && $nickname !== $this->lastName) {
      			$this->nickname = $nickname;
       			return $this->nickname;
    	} else {
        	throw new Exception("No cumple los requisitos para seleccionar el nickname");
    	}
	}


	public function setBirthDate(int $birthdate)
	{
		$this->birthDate = $birthdate;
		return $this->birthDate;
	}

	public function getBirthDate()
	{
		return $this->birthDate;
	}

	public function calAge()
	{
		return date("Y") - $this->birthDate;
	}
}


$person1= new Person("Santiago", "Marcella", 2002);

echo "Nombre: " . $person1->getFirstName() . " ";
echo "Apellido: " . $person1->getLastName() . " ";
echo "Edad: " . $person1->calAge() . " ";
echo "Nickname: " . $person1->getNickname() . " ";

$person1->setNickname("Muerte");
$person1->setFirstName("victor");
$person1->setLastName("Marbella");


echo "Nickname despues del cambio: " . $person1->getNickname() . " ";
echo "Nombre despues del cambio: " . $person1->getFirstName() . " ";
echo "Apellido despues del cambio: " . $person1->getLastName() . " ";


