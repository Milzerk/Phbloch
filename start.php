<?php

use Phbloch\Blockchain\Block;
use Phbloch\Blockchain\Blockchain;

require_once './vendor/autoload.php';

$phbloch = new Blockchain;

$phbloch->addBlock(new Block(1, date('Y-m-d H:i:s'), 'Block 1'));
$phbloch->addBlock(new Block(2, date('Y-m-d H:i:s'), 'Block 2'));
$phbloch->addBlock(new Block(3, date('Y-m-d H:i:s'), 'Block 3'));

echo $phbloch->isChainValid();
echo PHP_EOL;