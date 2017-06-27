<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Rules
 * @author Joost Mul <joost@jmul.net>
 *
 * Requests the server rules.
 *
 * This command is not formally defined in an RFC, but is used by most major IRC daemons.
 */
final class Rules extends Command
{
    /**
     * @return string
     */
    public function __toString()
    {
        return "RULES";
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "RULES";
    }
} 
