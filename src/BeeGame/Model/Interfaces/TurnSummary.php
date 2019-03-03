<?php
declare(strict_types=1);

namespace App\BeeGame\Model\Interfaces;

interface TurnSummary
{
    /**
     * @return string
     */
    public function toString(): string;
}