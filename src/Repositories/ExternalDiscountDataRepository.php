<?php

namespace App\Repositories;

use App\BonusCard;
use App\PromoCode;
use App\HttpServices\DiscountDataHttpService;

class ExternalDiscountDataRepository implements DiscountDataRepository
{
    private $data;

    public function __construct()
    {
        $discountDataService = new DiscountDataHttpService();
        $this->data = $discountDataService->getData();
    }

    public function getBonusCard(): BonusCard
    {
        return new BonusCard($this->data['bonusCard']['number'], $this->data['bonusCard']['balance']);
    }

    public function getPromoCode(): PromoCode
    {
        $promoCode = $this->data['personalPromoCodes'][0];
        return new PromoCode($promoCode['id'], $promoCode['displayValue'], $promoCode['description']);
    }
}