<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\BeeId;

final class WorkerBee extends Bee
{
    public const TYPE = 'Worker';

    private const LIFESPAN = 75;

    private const HIT_IMPACT = 10;

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