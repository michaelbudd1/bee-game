<?php
declare(strict_types=1);

namespace App\BeeGame\Model\Interfaces;

interface Bee
{
    /**
     * @return LifeRemaining
     */
    public function lifeRemaining(): LifeRemaining;

    /**
     * @return Bee
     */
    public function applyHit(): Bee;

    /**
     * @return BeeId
     */
    public function beeId(): BeeId;

    /**
     * @return HitImpact
     */
    public function hitImpact(): HitImpact;

    /**
     * @return string
     */
    public function type(): string;

    /**
     * @return bool
     */
    public function isTheQueen(): bool;

    /**
     * @return bool
     */
    public function isDead(): bool;

    /**
     * @return Bee
     */
    public function instantlyDie(): Bee;
}
