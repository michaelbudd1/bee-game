<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

final class DroneBee extends Bee
{
    private const LIFESPAN = 50;

    private const HIT_IMPACT = 12;

    public function __construct()
    {
        parent::__construct(
            new LifeRemaining(static::LIFESPAN),
            new HitImpact(static::HIT_IMPACT)
        );
    }
}