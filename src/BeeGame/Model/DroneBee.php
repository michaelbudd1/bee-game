<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\BeeId;

final class DroneBee extends Bee
{
    public const TYPE = 'Drone';

    private const LIFESPAN = 50;

    private const HIT_IMPACT = 12;

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
