<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class CommandDie
 * @author Joost Mul <joost@jmul.net>
 *
 * This command may only be issued by IRC channel operators.
 *
 * Instructs the server to shut down.
 *
 * Defined in RFC 2812
 */
final class CommandDie extends Command
{
    /**
     * @return string
     */
    public function __toString()
    {
        return 'DIE';
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "DIE";
    }
} 
