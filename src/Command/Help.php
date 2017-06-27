<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Help
 * @author Joost Mul <joost@jmul.net>
 *
 * Requests the server help file.
 *
 * This command is not formally defined in an RFC, but is in use by most major IRC daemons.
 */
final class Help extends Command
{
    /**
     * @return string
     */
    public function __toString()
    {
        return "HELP";
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "HELP";
    }
} 
