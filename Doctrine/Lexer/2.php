<?php

declare(strict_types=1);

use Doctrine\Common\Lexer\AbstractLexer;

/*
    CharacterTypeLexer  @Lexer
    UpperCaseCharacterExtracter  @Extracter
*/

class CharacterTypeLexer extends AbstractLexer
{
    const T_UPPER = 1;
    const T_LOWER = 2;
    const T_NUMBER = 3;

    protected function getCatchablePatterns(): array
    {
        return array(
            '[a-bA-Z0-9]',
        );
    }

    protected function getNonCatchablePatterns(): array
    {
        return array();
    }

    protected function getType(&$value): int
    {
        if (is_numeric($value)) {
            return self::T_NUMBER;
        }

        if (strtoupper($value) === $value) {
            return self::T_UPPER;
        }

        if (strtolower($value) === $value) {
            return self::T_LOWER;
        }
    }
}


class UpperCaseCharacterExtracter
{
    private $lexer;

    public function __construct(CharacterTypeLexer $lexer)
    {
        $this->lexer = $lexer;
    }

    public function getUpperCaseCharacters($string)
    {
        $this->lexer->setInput($string);
        $this->lexer->moveNext();

        $upperCaseChars = array();
        while (true) {
            if (!$this->lexer->lookahead) {
                break;
            }

            $this->lexer->moveNext();

            if ($this->lexer->token['type'] === CharacterTypeLexer::T_UPPER) {
                $upperCaseChars[] = $this->lexer->token['value'];
            }
        }

        return $upperCaseChars;
    }
}

$upperCaseCharacterExtractor = new UpperCaseCharacterExtracter(new CharacterTypeLexer());
$upperCaseCharacters = $upperCaseCharacterExtractor->getUpperCaseCharacters('1aBcdEfgHiJ12');

print_r($upperCaseCharacters);
// Array ( [0] => B [1] => E [2] => H [3] => J )