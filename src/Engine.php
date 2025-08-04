<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function startGame(array $data, string $description): void
{
    line('Welcome to the Brain Games!');
    $playerName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $playerName);

    line($description);

    foreach ($data as [$question, $answer]) {
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer:', false, ' ');

        if ($userAnswer !== $answer) {
            line("%s is wrong answer ;(. Correct answer was %s.", $userAnswer, $answer);
            line("Let's try again, %s!", $playerName);
            return;
        }

        line('Correct!');
    }

    line("Congratulations, %s!", $playerName);
}
