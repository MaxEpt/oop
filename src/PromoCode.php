<?php

namespace App;

final class PromoCode
{
    private $id;
    
    private $displayValue;

    private $description;

    public function __construct(string $id, string $displayValue, string $description = '')
    {
        if (empty($id) || empty($displayValue)) {
            throw new \InvalidArgumentException();
        }

        $this->id           = $id;
        $this->displayValue = $displayValue;
        $this->description  = $description;
    }

    public function getDisplayValue()
    {
        return $this->displayValue;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getId()
    {
        return $this->id;
    }
}