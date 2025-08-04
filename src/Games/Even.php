<?php

namespace PhpProject45\Games\Even;

use function cli\line;
use function cli\prompt;

function isEven($number): bool
{
    return $number % 2 === 0;
}

function startGame()
{
    line('Welcome to the Brain Games!');
    $playerName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $playerName);

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 1; $i <= 3; $i++) {
        $number = rand(1, 100);
        line("Question: %s", $number);

        $received = prompt('Your answer:', false, ' ');
        $expected = isEven($number) ? 'yes' : 'no';
        if ($received !== $expected) {
            line("%s is wrong answer ;(. Correct answer was %s.", $received, $expected);
            line("Let's try again, %s!", $playerName);
            return null;
        }
        line('Correct!');
    }
    line("Congratulations, %s!", $playerName);
}
