<?php

require_once __DIR__ . '/vendor/autoload.php';

// $initCmd = new Siad007\VersionControl\HG\Command\Init();
$initCmd = Siad007\VersionControl\HG\Factory::getInstance('init');
$initCmd->setDestination('C:\\xampp\\');
$initCmd->setSsh('testSSH');
$initCmd->setInsecure(true);
$initCmd->setVerbose(true);
$initCmd->setEncoding('UTF-8');
$initCmd->run();
