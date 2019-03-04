<?php
declare(strict_types=1);

namespace App\BeeGame\Model;

use App\BeeGame\Model\Interfaces\BeeId as BeeIdInterface;

final class BeeId implements BeeIdInterface
{
    /**
     * @var string
     */
    private $beeId;

    /**
     * @param string $beeId
     */
    public function __construct(string $beeId)
    {
        $this->beeId = $beeId;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->beeId;
    }
}
