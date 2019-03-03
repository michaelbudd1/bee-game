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
     * @return void
     */
    public function applyHit(): void;
}