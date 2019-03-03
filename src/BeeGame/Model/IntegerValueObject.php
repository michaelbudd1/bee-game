<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\IntegerValueObject as IntegerValueObjectInterface;

abstract class IntegerValueObject implements IntegerValueObjectInterface
{
    /**
     * @var int
     */
    protected $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function toInt(): int
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function isGreaterThanZero(): bool
    {
        return $this->value > 0;
    }

    /**
     * {@inheritdoc}
     */
    public function isLessThanOrEqualToZero(): bool
    {
        return $this->value <= 0;
    }
}