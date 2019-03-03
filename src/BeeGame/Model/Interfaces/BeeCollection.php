<?php
declare(strict_types=1);

namespace App\BeeGame\Model\Interfaces;

interface BeeCollection
{
    /**
     * @return bool
     */
    public function beesAreAllDead(): bool;

    /**
     * @return bool
     */
    public function queenIsDead(): bool;
}