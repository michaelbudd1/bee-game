<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\BeeId;

final class QueenBee extends Bee
{
    public const TYPE = 'Queen';

    private const LIFESPAN = 100;

    private const HIT_IMPACT = 8;

    /**
     * @param BeeId $beeId
     */
    public function __construct(BeeId $beeId)
    {
        parent::__construct(
            $beeId,
            new LifeRemaining(static::LIFESPAN),
            new HitImpact(static::HIT_IMPACT)
        );
    }
}