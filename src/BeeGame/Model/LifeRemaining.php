<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\HitImpact;
use App\BeeGame\Model\Interfaces\LifeRemaining as LifeRemainingInterface;

final class LifeRemaining implements LifeRemainingInterface
{
    /**
     * @var int
     */
    private $lifeRemaining;

    /**
     * @param int $lifeRemaining
     */
    public function __construct(int $lifeRemaining)
    {
        $this->lifeRemaining = $lifeRemaining;
    }

    /**
     * {@inheritdoc}
     */
    public function toInt(): int
    {
        return $this->lifeRemaining;
    }

    /**
     * {@inheritdoc}
     */
    public function reduce(HitImpact $hitImpact): void
    {
        $this->lifeRemaining-= $hitImpact->toInt();
    }
}