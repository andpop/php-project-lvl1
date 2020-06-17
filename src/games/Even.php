<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;

const TRY_COUNT = 3;
const MAX_NUMBER = 100;
const WIN_MESSAGE = 'Congratulations';
const LOOSE_MESSAGE = "Let's try again";

function isEven($number)
{
    return ($number % 2) === 0;
}

function getName()
{
    return prompt('May I have your name?');
}

function showDescription()
{
    line('');
    line('Welcome to the Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line('');
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

function getGuess()
{
    $guess = [];
    $number = rand(1, MAX_NUMBER);
    $correctAnswer = isEven($number) ? 'yes' : 'no';
    $guess['correctAnswer'] = $correctAnswer;

    line("Question: %d", $number);
    $answer = prompt('Your answer');

    $guess['answer'] = $answer;
    $guess['isCorrectAnswer'] = ($answer === $correctAnswer);

    return $guess;
}

function run()
{
    showDescription();
    $name = getName();
    sayHello($name);

    for ($i = 1; $i <= TRY_COUNT; $i++) {
        $guess = getGuess();
        if ($guess['isCorrectAnswer']) {
            showCorrectMessage();
        } else {
            break;
        }
    }
  
    sayGoodbye($guess['isCorrectAnswer'], $name);
}
