<?php

namespace Botchka;

/**
 * Class Command
 * @package Botchka
 * @author Joost Mul <joost@jmul.net>
 */
abstract class Command
{
    /**
     * Casts this command to string
     *
     * @return string
     */
    public final function toString()
    {
        return $this->__toString();
    }

    /**
     * Ensures the __toString() function exists, which is used to build the command string
     * @return string
     */
    public abstract function __toString();

    /**
     * Returns the syntax for this command
     *
     * @return string
     */
    public abstract function getSyntax();
} 
