<?php
declare(strict_types=1);

namespace App\BeeGame\Model\Interfaces;

interface IntegerValueObject
{
    /**
     * @return int
     */
    public function toInt(): int;

    /**
     * @return bool
     */
    public function isGreaterThanZero(): bool;

    /**
     * @return bool
     */
    public function isLessThanOrEqualToZero(): bool;
}
