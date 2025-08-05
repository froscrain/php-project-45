<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($divisor = 2; $divisor ** 2 <= $number; $divisor++) {
        if ($number % $divisor === 0) {
            return false;
        }
    }

    return true;
}

function prepareGameData(): array
{
    $data = [];

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $question = random_int(1, 100);
        $answer = isPrime($question) ? 'yes' : 'no';

        $data[] = [$question, $answer];
    }

    return $data;
}

function startBrainPrimeGame(): void
{
    $data = prepareGameData();

    startGame($data, DESCRIPTION);
}
