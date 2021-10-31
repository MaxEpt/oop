<?php

namespace App;

class ExampleService
{
    private $bonusCard;

    private $promoCode;

    public function __construct(BonusCard $bonusCard, PromoCode $promoCode)
    {
        $this->bonusCard = $bonusCard;
        $this->promoCode = $promoCode;
    }

    public function execute()
    {
        return [
            'BONUS_CARD' => [
                'NUMBER' => $this->bonusCard->getNumber(),
                'BALANCE' => $this->bonusCard->getBalance(),
            ],
            'PROMO_CODE' => [
                'DISPLAY_VALUE' => $this->promoCode->getDisplayValue(),
                'DESCRIPTION' => $this->promoCode->getDescription()
            ],
        ];   
    }
}