<?php

namespace BrainGames\Games\GameRunner;

use function cli\line;
use function cli\prompt;

const TRY_COUNT = 3;
const WIN_MESSAGE = 'Congratulations';
const LOOSE_MESSAGE = "Let's try again";

function runGame($gameDescription, $getGuess)
{
    line('');
    line('Welcome to the Brain Games!');
    line($gameDescription);
    line('');

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');

    for ($i = 1; $i <= TRY_COUNT; $i++) {
        $guess = $getGuess();
        line("Question: %s", $guess['question']);
        $answer = prompt('Your answer');

        $isCorrectAnswer = ($answer === $guess['correctAnswer']);
        if ($isCorrectAnswer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $guess['correctAnswer']);
            break;
        }
    }
  
    $message = $isCorrectAnswer ? WIN_MESSAGE : LOOSE_MESSAGE;
    line("%s, %s!", $message, $name);
}
