<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\Bee as BeeInterface;
use App\BeeGame\Model\Interfaces\HitImpact;
use App\BeeGame\Model\Interfaces\LifeRemaining;

abstract class Bee implements BeeInterface
{
    /**
     * @var LifeRemaining
     */
    private $lifeRemaining;

    /**
     * @var HitImpact
     */
    private $hitImpact;

    /**
     * @param LifeRemaining $lifeRemaining
     * @param HitImpact     $hitImpact
     */
    public function __construct(LifeRemaining $lifeRemaining, HitImpact $hitImpact)
    {
        $this->lifeRemaining = $lifeRemaining;
        $this->hitImpact     = $hitImpact;
    }

    /**
     * @return LifeRemaining
     */
    public function lifeRemaining(): LifeRemaining
    {
        return $this->lifeRemaining;
    }

    /**
     * @return void
     */
    public function applyHit(): void
    {
        $this->lifeRemaining->reduce($this->hitImpact);
    }
}