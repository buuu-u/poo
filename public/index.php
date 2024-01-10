<?php

namespace Styde;

require "../vendor/autoload.php";
require "../src/helpers.php";

$armor = new BronzeArmor();
$juan = new Soldier("Juan", $armor);
$antonio = new Archer("Antonio");

$antonio->attack($juan, $armor);