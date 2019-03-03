<?php
declare(strict_types=1);

namespace App\Command;

use App\BeeGame\Game;
use App\BeeGame\Model\BeeCollection;
use App\BeeGame\Model\DroneBee;
use App\BeeGame\Model\Interfaces\BeeCollection as BeeCollectionInterface;
use App\BeeGame\Model\QueenBee;
use App\BeeGame\Model\WorkerBee;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Tightenco\Collect\Support\Collection;

final class GameStartCommand extends Command
{
    private const HIT_ACTION = 'hit';

    private const GAME_ENDED = 'game ended';

    protected static $defaultName = 'game:start';

    protected function configure()
    {
        $this->setDescription('Starts the game');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|string
     *
     * @throws \ReflectionException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $game = new Game($this->createBeeCollection());

        while (static::HIT_ACTION === $this->nextAction($input, $output)) {
            if ($game->bees()->beesAreAllDead()) {
                $output->writeln(
                    sprintf(
                        '%s %d %s',
                        'The game has ended.',
                        $game->hitsRequiredToKillHive(),
                        'hits were needed to kill the hive.'
                    )
                );

                return static::GAME_ENDED;
            }

            $output->writeln($game->performHit()->toString());
        }
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return string
     */
    private function nextAction(InputInterface $input, OutputInterface $output): string
    {
        $helper = $this->getHelper('question');

        $question = new ChoiceQuestion('Please state your next action', ['hit', 'quit']);

        return $helper->ask($input, $output, $question);
    }

    /**
     * @return BeeCollectionInterface
     *
     * @throws \ReflectionException
     */
    private function createBeeCollection(): BeeCollectionInterface
    {
        /** @var Collection $workerBees */
        $workerBees = BeeCollection::createSwarm(WorkerBee::class, 5);

        /** @var Collection $droneBees */
        $droneBees = BeeCollection::createSwarm(DroneBee::class, 8);

        /** @var Collection $queenBee */
        $queenBee = BeeCollection::createSwarm(QueenBee::class, 1);

        return BeeCollection::wrap(
            $workerBees->merge($droneBees)
                ->merge($queenBee)
        );
    }
}
