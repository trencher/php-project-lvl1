<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Flow\flow;

const GAME_DESCRIPTION = "What is the result of the expression?";
const OPERATORS = ['-', '+', '*'];
const NUMBERS_OF_ROUNDS = 3;
const MIN_NUMBER = 1;
const MAX_NUMBER = 100;

function getQuestionAndAnswer()
{
    
    $num1 = random_int(MIN_NUMBER, MAX_NUMBER);
    $num2 = random_int(MIN_NUMBER, MAX_NUMBER);
    $operator = OPERATORS[array_rand(OPERATORS)];
    $questionAndAnswer[] = "$num1$operator$num2";

    switch ($operator) {
        case '-':
            $questionAndAnswer[] = $num1 - $num2;
            break;
        case '+':
            $questionAndAnswer[] = $num1 + $num2;
            break;
        case '*':
            $questionAndAnswer[] = $num1 * $num2;
            break;
    }
    
    return $questionAndAnswer;
}

function run()
{
    for ($i = 0; $i < NUMBERS_OF_ROUNDS; $i++) {
        $questionAndAnswer[] = getQuestionAndAnswer();
    }

    flow(GAME_DESCRIPTION, $questionAndAnswer);
}
