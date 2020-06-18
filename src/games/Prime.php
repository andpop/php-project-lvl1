<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\GameRunner\runGame;

const MAX_NUMBER = 100;
const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($number)
{
    if ($number === 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function runPrimeGame()
{
    $getGuess = function () {
        $guess = [];
        $number = rand(1, MAX_NUMBER);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $guess['correctAnswer'] = $correctAnswer;

        line("Question: %d", $number);
        $answer = prompt('Your answer');

        $guess['answer'] = $answer;
        $guess['isCorrectAnswer'] = ($answer === $correctAnswer);

        return $guess;
    };
    
    runGame(GAME_DESCRIPTION, $getGuess);
}
