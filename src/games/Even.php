<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\GameRunner\runGame;

const MAX_NUMBER = 100;
const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($number)
{
    return ($number % 2) === 0;
}

function runEvenGame()
{
    $getGuess = function () {
        $guess = [];
        $number = rand(1, MAX_NUMBER);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $guess['correctAnswer'] = $correctAnswer;

        line("Question: %d", $number);
        $answer = prompt('Your answer');

        $guess['answer'] = $answer;
        $guess['isCorrectAnswer'] = ($answer === $correctAnswer);

        return $guess;
    };
    
    runGame(GAME_DESCRIPTION, $getGuess);
}
