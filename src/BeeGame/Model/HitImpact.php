<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\HitImpact as HitImpactInterface;

final class HitImpact extends IntegerValueObject implements HitImpactInterface
{
    /**
     * {@inheritdoc}
     */
    public function add(HitImpactInterface $hitImpact): HitImpactInterface
    {
        return new static($this->value + $hitImpact->toInt());
    }
}
