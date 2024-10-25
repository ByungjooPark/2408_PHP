<?php
require_once('./Whale.php');
require_once('./FlyingSquirrel.php');
require_once('./GoldFish.php');

use PHP\oop\Whale;
use PHP\oop\FlyingSquirrel;
use PHP\oop\GoldFish;


$whale = new Whale('고래', '바다');
echo $whale->printInfo();

$flyingSquirrel = new FlyingSquirrel('날다람쥐', '산');
echo $flyingSquirrel->printInfo();

$goldFish = new GoldFish();
echo $goldFish->printPet();