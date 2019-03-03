<?php
declare(strict_types=1);

namespace App\BeeGame\Model\Interfaces;

interface IntegerValueObject
{
    /**
     * @return int
     */
    public function toInt(): int;
}