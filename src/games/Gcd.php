<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\GameRunner\runGame;

const MAX_NUMBER = 100;
const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : abs($b);
}

function runGcdGame()
{
    $getGuess = function () {
        $guess = [];

        $number1 = rand(1, MAX_NUMBER);
        $number2 = rand(1, MAX_NUMBER);

        $correctAnswer = gcd($number1, $number2);
        $guess['correctAnswer'] = $correctAnswer;

        line("Question: %d %d", $number1, $number2);
        $answer = prompt('Your answer');
        $answer = (int)$answer;

        $guess['answer'] = $answer;
        $guess['isCorrectAnswer'] = ($answer === $correctAnswer);

        return $guess;
    };
    
    runGame(GAME_DESCRIPTION, $getGuess);
}
