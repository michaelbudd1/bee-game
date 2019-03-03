<?php
declare(strict_types=1);

namespace App\Tests;

use App\BeeGame\Model\BeeCollection;
use App\BeeGame\Model\DroneBee;
use App\BeeGame\Model\Interfaces\Bee;
use App\BeeGame\Model\QueenBee;
use App\BeeGame\Model\WorkerBee;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

final class BeeCollectionTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function testCheckAllBeesAreDeadEvaluatesCorrectly(): void
    {
        $beeCollection = BeeCollection::make();

        $queenBee  = new QueenBee();
        $droneBee  = new DroneBee();
        $workerBee = new WorkerBee();

        $beeCollection->add($queenBee);
        $beeCollection->add($droneBee);
        $beeCollection->add($workerBee);

        $this->assertFalse($beeCollection->beesAreAllDead());
    }

    /**
     * @test
     *
     * @return void
     */
    public function testAllBeesAreDeadAfterEnoughHits(): void
    {
        $beeCollection = BeeCollection::make();

        $queenBee  = new QueenBee();
        $droneBee  = new DroneBee();
        $workerBee = new WorkerBee();

        $beeCollection->add($queenBee);
        $beeCollection->add($droneBee);
        $beeCollection->add($workerBee);

        $beeCollection->each(function (Bee $bee) {
            for ($i = 0; $i < 100; $i++) {
                $bee->applyHit();
            }
        });

        $this->assertTrue($beeCollection->beesAreAllDead());
    }
}