<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Restart
 * @author Joost Mul <joost@jmul.net>
 *
 * Restarts a server. It may only be sent by IRC Operators.
 *
 * Defined in RFC 1459
 */
final class Restart extends Command
{
    /**
     * @return string
     */
    public function __toString()
    {
        return "RESTART";
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "RESTART";
    }
} 
