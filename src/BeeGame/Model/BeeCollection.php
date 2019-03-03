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
     * @return bool
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
     * @return bool
     */
    public function queenIsDead(): bool
    {
        // TODO: Implement queenIsDead() method.
    }
}