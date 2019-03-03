<?php
declare(strict_types=1);

namespace App\BeeGame;

use App\BeeGame\Interfaces\Game as GameInterface;
use App\BeeGame\Model\Interfaces\BeeCollection;
use App\BeeGame\Model\Interfaces\TurnSummary as TurnSummaryInterface;
use App\BeeGame\Model\TurnSummary;

final class Game implements GameInterface
{
    /**
     * @var BeeCollection
     */
    private $bees;

    /**
     * @var int
     */
    private $hitsRequiredToKillHive = 1;

    /**
     * @param BeeCollection $bees
     */
    public function __construct(BeeCollection $bees)
    {
        $this->bees = $bees;
    }

    /**
     * {@inheritdoc}
     */
    public function performHit(): TurnSummaryInterface
    {
        $this->hitsRequiredToKillHive++;

        $randomBee = $this->bees->randomBee();

        $randomBee = $randomBee->applyHit();

        $this->bees->updateBee($randomBee);

        if ($this->bees->queen()->isDead()) {
            $this->bees = $this->bees->allDieInstantly();
        }

        return new TurnSummary($randomBee);
    }

    /**
     * {@inheritdoc}
     */
    public function hitsRequiredToKillHive(): int
    {
        return $this->hitsRequiredToKillHive;
    }

    /**
     * {@inheritdoc}
     */
    public function bees(): BeeCollection
    {
        return $this->bees;
    }
}