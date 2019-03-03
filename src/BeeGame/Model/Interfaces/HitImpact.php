<?php
declare(strict_types=1);

namespace App\BeeGame\Model\Interfaces;

interface HitImpact extends IntegerValueObject
{
    /**
     * @param HitImpact $hitImpact
     *
     * @return HitImpact
     */
    public function add(HitImpact $hitImpact): HitImpact;
}