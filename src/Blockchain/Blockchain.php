<?php

namespace Phbloch\Blockchain;

class Blockchain
{
    public $chain;
    public $difficulty;

    public function __construct($difficulty = 4)
    {
        $this->chain = [];
        $this->difficulty = $difficulty;
        $this->createGenesisBlock();
    }

    public function createGenesisBlock()
    {
        $this->chain[] = new Block(0, date('Y-m-d H:i:s'), 'Genesis block', '0');
    }

    public function getLatestBlock()
    {
        return $this->chain[count($this->chain) - 1];
    }

    public function addBlock($newBlock)
    {
        $newBlock->previousHash = $this->getLatestBlock()->hash;
        $newBlock->mineBlock($this->difficulty);
        $this->chain[] = $newBlock;
        return $newBlock;
    }

    public function isChainValid()
    {
        for ($i = 1; $i < count($this->chain); $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i - 1];

            if ($currentBlock->hash !== $currentBlock->calculateHash()) {
                return false;
            }

            if ($currentBlock->previousHash !== $previousBlock->hash) {
                return false;
            }
        }

        return true;
    }
}

    