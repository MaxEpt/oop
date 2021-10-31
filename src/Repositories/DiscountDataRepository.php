<?php

namespace App\Repositories;

use App\BonusCard;
use App\PromoCode;

interface DiscountDataRepository
{
    public function getPromoCode(): PromoCode;

    public function getBonusCard(): BonusCard;
}