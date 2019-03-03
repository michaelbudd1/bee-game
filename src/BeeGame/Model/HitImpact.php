<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\HitImpact as HitImpactInterface;

final class HitImpact implements HitImpactInterface
{
    /**
     * @var int
     */
    private $hitImpact;

    /**
     * @param int $hitImpact
     */
    public function __construct(int $hitImpact)
    {
        $this->hitImpact = $hitImpact;
    }

    /**
     * @return int
     */
    public function toInt(): int
    {
        return $this->hitImpact;
    }
}