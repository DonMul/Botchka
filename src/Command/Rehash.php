<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Rehash
 * @author Joost Mul <joost@jmul.net>
 *
 * Causes the server to re-read and re-process its configuration file(s). This command can only be sent by IRC
 * Operators.
 *
 * Defined in RFC 1459
 */
final class Rehash extends Command
{
    /**
     * @return string
     */
    public function __toString()
    {
        return "REHASH";
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "REHASH";
    }
} 
