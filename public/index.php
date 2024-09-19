<?php

namespace Styde;

require '../vendor/autoload.php';

$ramm = new Soldier("Ramm");
$silence = new Archer("Silence");

$silence->attack($ramm);

$ramm->setArmor(new BronzeArmor);

$silence->setArmor(new EvasedArmor);

$silence->attack($ramm);

$ramm->attack($silence);