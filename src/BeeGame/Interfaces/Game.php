<?php
declare(strict_types=1);

namespace App\BeeGame\Interfaces;

interface Game
{
    /**
     * @return void
     */
    public function start(): void;
}