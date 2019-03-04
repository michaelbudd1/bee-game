<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\Bee;
use App\BeeGame\Model\Interfaces\BeeCollection as BeeCollectionInterface;
use App\BeeGame\Model\Interfaces\LifeRemaining as LifeRemainingInterface;
use Tightenco\Collect\Support\Collection;

final class BeeCollection extends Collection implements BeeCollectionInterface
{
    /**
     * {@inheritdoc}
     */
    public function beesAreAllDead(): bool
    {
        /** @var LifeRemainingInterface $lifeRemaining */
        $lifeRemaining = $this->reduce(function (LifeRemaining $carry, Bee $bee) {
            return $carry->add($bee->lifeRemaining());
        }, new LifeRemaining(0));

        return $lifeRemaining->isLessThanOrEqualToZero();
    }

    /**
     * {@inheritdoc}
     */
    public function randomBee(): Bee
    {
        return $this->random();
    }

    /**
     * {@inheritdoc}
     *
     * @throws \ReflectionException
     */
    public static function createSwarm(string $type, int $amount): BeeCollectionInterface
    {
        $beeCollection = BeeCollection::make();

        for ($i = 0; $i < $amount; $i++) {
            $reflectionClass = new \ReflectionClass($type);

            $beeId = new BeeId(
                sprintf(
                    '%s_%s',
                    $reflectionClass->getShortName(),
                    $i
                )
            );

            /** @var Bee $bee */
            $bee = new $type($beeId);

            $beeCollection->put($bee->beeId()->toString(), $bee);
        }

        return $beeCollection;
    }

    /**
     * {@inheritdoc}
     */
    public function updateBee(Bee $bee): void
    {
        $this->put($bee->beeId()->toString(), $bee);
    }

    /**
     * {@inheritdoc}
     */
    public function allDieInstantly(): BeeCollectionInterface
    {
        return $this->map(function (Bee $bee) {
            return $bee->instantlyDie();
        });
    }

    /**
     * @return Bee
     */
    public function queen(): Bee
    {
        return $this->filter(function (Bee $bee) {
            return $bee->isTheQueen();
        })->first();
    }
}
