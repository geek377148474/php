<?php


use Doctrine\Common\Lexer\AbstractLexer;

/**
 * @var \Doctrine\ORM\Query\Lexer
 * @var \Doctrine\ORM\Query\Parser
 */


class Lexer extends AbstractLexer
{
    public function __construct($input)
    {
        $this->setInput($input);
    }

    protected function getCatchablePatterns()
    {
        return [
            '[a-z_][a-z0-9_]*\:[a-z_][a-z0-9_]*(?:\\\[a-z_][a-z0-9_]*)*', // aliased name
            '[a-z_\\\][a-z0-9_]*(?:\\\[a-z_][a-z0-9_]*)*', // identifier or qualified name
            '(?:[0-9]+(?:[\.][0-9]+)*)(?:e[+-]?[0-9]+)?', // numbers
            "'(?:[^']|'')*'", // quoted strings
            '\?[0-9]*|:[a-z_][a-z0-9_]*', // parameters
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getNonCatchablePatterns()
    {
        return ['\s+', '(.)'];
    }

    /**
     * {@inheritdoc}
     */
    protected function getType(&$value)
    {
        $type = mt_rand(1);
        return $type;
    }
}

class Parser
{
    // ...
}

// $parser = new Parser('SELECT u FROM User u');
// $AST = $parser->getAST(); // returns \Doctrine\ORM\Query\AST\SelectStatement
