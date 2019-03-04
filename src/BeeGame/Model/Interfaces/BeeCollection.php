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
     * @return Bee
     */
    public function randomBee(): Bee;

    /**
     * @param Bee $bee
     */
    public function updateBee(Bee $bee): void;

    /**
     * @param string $type
     * @param int    $amount
     *
     * @return BeeCollection
     */
    public static function createSwarm(string $type, int $amount): BeeCollection;

    /**
     * @return void
     */
    public function allDieInstantly(): BeeCollection;

    /**
     * @return Bee
     */
    public function queen(): Bee;
}
