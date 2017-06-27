<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Who
 * @author Joost Mul <joost@jmul.net>
 *
 * Returns a list of users who match <name>.[54] If the flag "o" is given, the server will only return information about IRC Operators.
 *
 * Defined in RFC 1459
 */
final class Who extends Command
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "WHO [<name>]";
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "WHO {$this->getName()}";
    }
} 
