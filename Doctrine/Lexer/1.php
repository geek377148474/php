<?php

declare(strict_types=1);

use Doctrine\Common\Lexer\AbstractLexer;

/*
    setInput($input) - Sets the input data to be tokenized. The Lexer is immediately reset and the new input tokenized.
    reset() - Resets the lexer.
    resetPeek() - Resets the peek pointer to 0.
    resetPosition($position = 0) - Resets the lexer position on the input to the given position.
    isNextToken($token) - Checks whether a given token matches the current lookahead.
    isNextTokenAny(array $tokens) - Checks whether any of the given tokens matches the current lookahead.
    moveNext() - Moves to the next token in the input string.
    skipUntil($type) - Tells the lexer to skip input tokens until it sees a token with the given value.
    isA($value, $token) - Checks if given value is identical to the given token.
    peek() - Moves the lookahead token forward.
    glimpse() - Peeks at the next token, returns it and immediately resets the peek.

*/
/*
    @Lexer

    // Lexical catchable patterns.  @return array
    abstract protected function getCatchablePatterns();

    // Lexical non-catchable patterns.  @return array
    abstract protected function getNonCatchablePatterns();

    // Retrieve token type. Also processes the token value if necessary.
    // @param string $value  @return integer
    abstract protected function getType(&$value);

*/
