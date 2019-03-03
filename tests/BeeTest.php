<?php
declare(strict_types=1);

namespace App\Tests;

use App\BeeGame\Model\BeeId;
use App\BeeGame\Model\DroneBee;
use App\BeeGame\Model\LifeRemaining;
use App\BeeGame\Model\QueenBee;
use App\BeeGame\Model\WorkerBee;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

final class BeeTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function testQueenBeeLifespanIsCorrect(): void
    {
        $queenBee = new QueenBee(new BeeId('queen_1'));

        $this->assertEquals(
            new LifeRemaining(100),
            $queenBee->lifeRemaining()
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function testWorkerBeeLifespanIsCorrect(): void
    {
        $workerBee = new WorkerBee(new BeeId('worker_1'));

        $this->assertEquals(
            new LifeRemaining(75),
            $workerBee->lifeRemaining()
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function testDroneBeeLifespanIsCorrect(): void
    {
        $droneBee = new DroneBee(new BeeId('drone_1'));

        $this->assertEquals(
            new LifeRemaining(50),
            $droneBee->lifeRemaining()
        );
    }


    /**
     * @test
     *
     * @return void
     */
    public function testHitAgainstQueenBeeReducedLifeRemaining(): void
    {
        $queenBee = new QueenBee(new BeeId('queen_1'));

        $queenBee->applyHit();
        $queenBee->applyHit();

        $this->assertEquals(
            new LifeRemaining(84),
            $queenBee->lifeRemaining()
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function testHitAgainstWorkerBeeReducedLifeRemaining(): void
    {
        $workerBee = new WorkerBee(new BeeId('worker_1'));

        $workerBee->applyHit();
        $workerBee->applyHit();

        $this->assertEquals(
            new LifeRemaining(55),
            $workerBee->lifeRemaining()
        );
    }

    /**
     * @test
     *
     * @return void
     */
    public function testHitAgainstDroneBeeReducedLifeRemaining(): void
    {
        $droneBee = new DroneBee(new BeeId('drone_1'));

        $droneBee->applyHit();
        $droneBee->applyHit();

        $this->assertEquals(
            new LifeRemaining(26),
            $droneBee->lifeRemaining()
        );
    }
}