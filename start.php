<?php

use Phbloch\Blockchain\Block;
use Phbloch\Blockchain\Blockchain;

require_once './vendor/autoload.php';

system('clear');

$dificuldade = 4;

echo 'Pressione Ctrl+C para sair.' . PHP_EOL;
$data = readline('Dificuldade do Blockchain: ');

if (is_numeric($data)) {
    $dificuldade = (int)$data;
}

$phbloch = new Blockchain($dificuldade);

$sair = false;
while (!$sair) {

    $data = readline('Conteúdo do Bloco: ');

    creatingBlock($phbloch, $data);

    if (!$phbloch->isChainValid()) {
        echo 'ERROR';
        $sair = true;
    }
     
    $blockchain = fopen("blockchain.json", "w");
    fwrite($blockchain, json_encode($phbloch->chain, JSON_PRETTY_PRINT));
    fclose($blockchain);
}



function creatingBlock(Blockchain $phbloch, $data): void
{
    $start_time = microtime(true);

    $newBlock = new Block(count($phbloch->chain), date('Y-m-d H:i:s'), $data, $phbloch->difficulty);
    $newBlock = $phbloch->addBlock($newBlock);

    $end_time = microtime(true);
    $execution_time = ($end_time - $start_time);
    
    $start_time = microtime(false);
    $end_time = microtime(false);
    echo 'Block mined: ' . $newBlock->hash . ' -tempo: ' . $execution_time . 's' . PHP_EOL;
}
