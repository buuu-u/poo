<?php

namespace Styde;
require "./helpers.php";

spl_autoload_register(function ($className){

    if(strpos($className, "Styde\\") === 0){
        $className = str_replace("Styde\\", "", $className);
    }
    if(file_exists("./$className.php")){
        require "./$className.php";
    }
});

$armor = new BronzeArmor();
$juan = new Soldier("Juan", $armor);
$antonio = new Archer("Antonio");

$antonio->attack($juan, $armor);