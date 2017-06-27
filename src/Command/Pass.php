<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Command_Pass
 * @author Joost Mul <joost@jmul.net>
 *
 * Sets a connection password. This command must be sent before the NICK/USER registration combination.
 *
 * Defined in RFC 1459
 */
final class Pass extends Command
{
    /**
     * @var string
     */
    protected $password = '';

    /**
     * @param $password
     */
    public function __construct($password)
    {
        $this->setPassword($password);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "PASS <password>";
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "PASS {$this->getPassword()}";
    }
} 
