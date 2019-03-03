<?php
declare(strict_types=1);

namespace App\BeeGame;

use App\BeeGame\Interfaces\Game as GameInterface;
use App\BeeGame\Model\Interfaces\BeeCollection;

final class Game implements GameInterface
{
    /**
     * @var BeeCollection
     */
    private $bees;

    /**
     * @param BeeCollection $bees
     */
    public function __construct(BeeCollection $bees)
    {
        $this->bees = $bees;
    }

    /**
     * @return void
     */
    public function start(): void
    {
        while (true) {
            dd($this->bees->beesAreAllDead());
        }
    }
}