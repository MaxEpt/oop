<?php

namespace App\Repositories;

use App\BonusCard;
use App\PromoCode;

class LocalDiscountDataRepository implements DiscountDataRepository
{
    public function getBonusCard(): BonusCard
    {
        return new BonusCard("123_123", 200);
    }

    public function getPromoCode(): PromoCode
    {
        return new PromoCode('111', '111', 'local data');
    }
}