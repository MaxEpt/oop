<?php

namespace App;

final class BonusCard
{
    private $number;

    private $balance;

    public function __construct(string $number, int $balance)
    {
        if ($balance < 0) {
            throw new \InvalidArgumentException();
        }

        $this->balance = $balance;
        $this->number  = $number;
    }

    public function getNumber()
    {
        return $this->balance;
    }

    public function getBalance()
    {
        return $this->number;
    }
}