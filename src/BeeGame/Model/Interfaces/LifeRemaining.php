<?php
declare(strict_types=1);

namespace App\BeeGame\Model\Interfaces;

interface LifeRemaining extends IntegerValueObject
{
    /**
     * @param HitImpact $hitImpact
     *
     * @return void
     */
    public function reduce(HitImpact $hitImpact): void;

    /**
     * @param LifeRemaining $lifeRemaining
     *
     * @return LifeRemaining
     */
    public function add(LifeRemaining $lifeRemaining): LifeRemaining;
}