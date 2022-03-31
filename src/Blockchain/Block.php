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
    public $difficulty;

    public function __construct($index, $timestamp, $data, $difficulty, $previousHash = '')
    {
        $this->index = $index;
        $this->timestamp = $timestamp;
        $this->data = $data;
        $this->previousHash = $previousHash;
        $this->hash = $this->calculateHash();
        $this->difficulty = $difficulty;
        $this->nonce = 0;
    }

    public function calculateHash()
    {
        return hash('sha256', $this->index . $this->previousHash . $this->timestamp . $this->data . $this->nonce);
    }

    public function mineBlock($difficulty)
    {
        while (substr($this->hash, 0, $difficulty) !== str_repeat('0', $difficulty)) {
            $this->nonce++;
            $this->hash = $this->calculateHash();
        }
    }
}
