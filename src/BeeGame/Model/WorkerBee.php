<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

final class WorkerBee extends Bee
{
    private const LIFESPAN = 75;

    private const HIT_IMPACT = 10;

    public function __construct()
    {
        parent::__construct(
            new LifeRemaining(static::LIFESPAN),
            new HitImpact(static::HIT_IMPACT)
        );
    }
}