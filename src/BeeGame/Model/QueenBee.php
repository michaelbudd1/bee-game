<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

final class QueenBee extends Bee
{
    private const LIFESPAN = 100;

    private const HIT_IMPACT = 8;

    public function __construct()
    {
        parent::__construct(
            new LifeRemaining(static::LIFESPAN),
            new HitImpact(static::HIT_IMPACT)
        );
    }
}