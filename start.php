<?php

use Phbloch\Blockchain\Block;
use Phbloch\Blockchain\Blockchain;

require_once './vendor/autoload.php';

$phbloch = new Blockchain(4);

// $phbloch->addBlock(new Block(1, date('Y-m-d H:i:s'), 'Adriana paga miller - 50 R$'));
// $phbloch->addBlock(new Block(2, date('Y-m-d H:i:s'), 'Adriana paga miller - 60 R$'));
// $phbloch->addBlock(new Block(3, date('Y-m-d H:i:s'), 'Miller paga Adriana - 0,50 R$'));
// $phbloch->addBlock(new Block(3, date('Y-m-d H:i:s'), 'Miller paga Thiago - 0,50 R$'));

$sair = false;
while (!$sair) {

    $data = readline('Conteúdo do Bloco: ');
    $phbloch->addBlock(new Block(count($phbloch->chain) + 1, date('Y-m-d H:i:s'), $data));

    echo PHP_EOL;

    if (!$phbloch->isChainValid()) {
        echo 'ERROR';
        $sair = true;
    }

    echo json_encode($phbloch->chain, JSON_PRETTY_PRINT);
    echo PHP_EOL;

}
