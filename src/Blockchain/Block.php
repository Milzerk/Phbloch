<?php

namespace Phbloch\Blockchain;


class Block
{
    public $index;
    public $timestamp;
    public $data;
    public $previousHash;
    public $hash;
    public $nonce;

    public function __construct($index, $timestamp, $data, $previousHash = '')
    {
        $this->index = $index;
        $this->timestamp = $timestamp;
        $this->data = $data;
        $this->previousHash = $previousHash;
        $this->hash = $this->calculateHash();
        $this->nonce = 0;
    }

    public function calculateHash()
    {
        return hash('sha256', $this->index . $this->previousHash . $this->timestamp . $this->data . $this->nonce);
    }

    public function mineBlock($difficulty)
    {
        $start_time = microtime(true);

        while (substr($this->hash, 0, $difficulty) !== str_repeat('0', $difficulty)) {
            $this->nonce++;
            $this->hash = $this->calculateHash();
            // echo $this->nonce . PHP_EOL;
        // system('clear');

        }
        
        $end_time = microtime(true);
        system('clear');
        $execution_time = ($end_time - $start_time);

        echo 'Block mined: ' . $this->hash . ' -tempo: ' . $execution_time . ' s' . PHP_EOL;
    }
}
