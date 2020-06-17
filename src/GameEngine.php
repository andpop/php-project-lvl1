<?php

namespace BrainGames\Games\GameEngine;

use function cli\line;
use function cli\prompt;

const TRY_COUNT = 3;
const WIN_MESSAGE = 'Congratulations';
const LOOSE_MESSAGE = "Let's try again";

function showDescription($gameDescription)
{
    line('');
    line('Welcome to the Brain Games!');
    line($gameDescription);
    line('');
}

function getName()
{
    return prompt('May I have your name?');
}

function sayHello($name)
{
    line("Hello, %s!", $name);
    line('');
}

function showCorrectMessage()
{
    line('Correct!');
}

function showIncorrectMessage($guess)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $guess['answer'], $guess['correctAnswer']);
}

function sayGoodbye($isCorrectAnswer, $name)
{
    $message = $isCorrectAnswer ? WIN_MESSAGE : LOOSE_MESSAGE;
    line("%s, %s!", $message, $name);
}

function run($gameDescription, $getGuess)
{
    showDescription($gameDescription);
    $name = getName();
    sayHello($name);

    for ($i = 1; $i <= TRY_COUNT; $i++) {
        $guess = $getGuess();
        if ($guess['isCorrectAnswer']) {
            showCorrectMessage();
        } else {
            break;
        }
    }
  
    sayGoodbye($guess['isCorrectAnswer'], $name);
}
