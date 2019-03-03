<?php
declare(strict_types=1);

namespace App\Tests;

use App\BeeGame\Game;
use App\BeeGame\Model\BeeCollection;
use App\BeeGame\Model\BeeId;
use App\BeeGame\Model\DroneBee;
use App\BeeGame\Model\Interfaces\Bee;
use App\BeeGame\Model\LifeRemaining;
use App\BeeGame\Model\QueenBee;
use App\BeeGame\Model\WorkerBee;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Tightenco\Collect\Support\Collection;

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

        $queenBee  = new QueenBee(new BeeId('queen_1'));
        $droneBee  = new DroneBee(new BeeId('drone_1'));
        $workerBee = new WorkerBee(new BeeId('worker_1'));

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

        $queenBee  = new QueenBee(new BeeId('queen_1'));
        $droneBee  = new DroneBee(new BeeId('drone_1'));
        $workerBee = new WorkerBee(new BeeId('worker_1'));

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

    /**
     * @test
     *
     * @return void
     *
     * @throws \ReflectionException
     */
    public function testDeathOfQueenBeeKillsTheOthers(): void
    {
        $queenBee = new QueenBee(new BeeId('queen_1'));
        $queenBee->instantlyDie();

        /** @var Collection $queenBees */
        $queenBees = BeeCollection::wrap($queenBee);

        /** @var Collection $workerBees */
        $workerBees = BeeCollection::createSwarm(WorkerBee::class, 5);

        /** @var Collection $droneBees */
        $droneBees = BeeCollection::createSwarm(DroneBee::class, 8);

        $beeCollection = BeeCollection::wrap(
            $queenBees->merge($workerBees)->merge($droneBees)
        );

        $game = new Game($beeCollection);

        $game->performHit();

        $beeCollection->each(function (Bee $bee) {
            $this->assertEquals(
                new LifeRemaining(0),
                $bee->lifeRemaining()
            );
        });
    }
}