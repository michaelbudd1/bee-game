<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\Bee;
use App\BeeGame\Model\Interfaces\TurnSummary as TurnSummaryInterface;

final class TurnSummary implements TurnSummaryInterface
{
    /**
     * @var Bee
     */
    private $bee;

    /**
     * @param Bee $bee
     */
    public function __construct(Bee $bee)
    {
        $this->bee = $bee;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return sprintf(
            '%s %d %s %s %s',
            'Direct Hit. You took',
            $this->bee->hitImpact()->toInt(),
            'hit points from a',
            $this->bee->type(),
            'bee'
        );
    }
}
