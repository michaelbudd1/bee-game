<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\Bee as BeeInterface;
use App\BeeGame\Model\Interfaces\BeeId;
use App\BeeGame\Model\Interfaces\HitImpact;
use App\BeeGame\Model\Interfaces\LifeRemaining as LifeRemainingInterface;
use App\BeeGame\Model\LifeRemaining;

abstract class Bee implements BeeInterface
{
    /**
     * @var LifeRemainingInterface
     */
    private $lifeRemaining;

    /**
     * @var HitImpact
     */
    private $hitImpact;

    /**
     * @var BeeId
     */
    private $beeId;

    /**
     * @param BeeId                  $beeId
     * @param LifeRemainingInterface $lifeRemaining
     * @param HitImpact              $hitImpact
     */
    public function __construct(BeeId $beeId, LifeRemainingInterface $lifeRemaining, HitImpact $hitImpact)
    {
        $this->lifeRemaining = $lifeRemaining;
        $this->hitImpact     = $hitImpact;
        $this->beeId         = $beeId;
    }

    /**
     * {@inheritdoc}
     */
    public function lifeRemaining(): LifeRemainingInterface
    {
        return $this->lifeRemaining;
    }

    /**
     * {@inheritdoc}
     */
    public function applyHit(): BeeInterface
    {
        $this->lifeRemaining->reduce($this->hitImpact);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function beeId(): BeeId
    {
        return $this->beeId;
    }

    /**
     * {@inheritdoc}
     */
    public function hitImpact(): HitImpact
    {
        return $this->hitImpact;
    }

    /**
     * {@inheritdoc}
     */
    public function type(): string
    {
        return static::TYPE;
    }

    /**
     * {@inheritdoc}
     */
    public function isTheQueen(): bool
    {
        return $this->type() === QueenBee::TYPE;
    }

    /**
     * {@inheritdoc}
     */
    public function isDead(): bool
    {
        return $this->lifeRemaining->isLessThanOrEqualToZero();
    }

    /**
     * {@inheritdoc}
     */
    public function instantlyDie(): BeeInterface
    {
        $this->lifeRemaining = new LifeRemaining(0);

        return $this;
    }
}
