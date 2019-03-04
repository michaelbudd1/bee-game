<?php
declare(strict_types=1);

namespace App\BeeGame\Interfaces;

use App\BeeGame\Model\Interfaces\BeeCollection;
use App\BeeGame\Model\Interfaces\TurnSummary;

interface Game
{
    /**
     * @return TurnSummary
     */
    public function performHit(): TurnSummary;

    /**
     * @return BeeCollection
     */
    public function bees(): BeeCollection;

    /**
     * @return int
     */
    public function hitsRequiredToKillHive(): int;
}
