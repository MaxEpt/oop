<?php

namespace App;

use App\Repositories\DiscountDataRepository;

class ExampleService2
{
    private $discountDataRepository;

    public function __construct(DiscountDataRepository $repository)
    {
        $this->discountDataRepository = $repository;
    }

    public function execute()
    {
        $promoCode = $this->discountDataRepository->getPromoCode();
        $bonusCard = $this->discountDataRepository->getBonusCard();

        return [
            'BONUS_CARD' => [
                'NUMBER' => $bonusCard->getNumber(),
                'BALANCE' => $bonusCard->getBalance(),
            ],
            'PROMO_CODE' => [
                'DISPLAY_VALUE' => $promoCode->getDisplayValue(),
                'DESCRIPTION' => $promoCode->getDescription()
            ],
        ];   
    }
}