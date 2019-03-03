<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\HitImpact;
use App\BeeGame\Model\Interfaces\LifeRemaining as LifeRemainingInterface;

final class LifeRemaining extends IntegerValueObject implements LifeRemainingInterface
{
    /**
     * {@inheritdoc}
     */
    public function reduce(HitImpact $hitImpact): void
    {
        $this->value-= $hitImpact->toInt();
    }

    /**
     * @param LifeRemainingInterface $lifeRemaining
     *
     * @return LifeRemainingInterface
     */
    public function add(LifeRemainingInterface $lifeRemaining): LifeRemainingInterface
    {
        $newLifeRemainingValue = $this->value + $lifeRemaining->toInt();

        return new static($newLifeRemainingValue);
    }
}