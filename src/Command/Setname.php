<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Setname
 * @author Joost Mul <joost@jmul.net>
 *
 * Allows a client to change the "real name" specified when registering a connection.
 *
 * This command is not formally defined by an RFC, but is in use by some IRC daemons. Support is indicated in a
 * RPL_ISUPPORT reply (numeric 005) with the SETNAME keyword
 */
final class Setname extends Command
{
    /**
     * @var string
     */
    protected $newRealName = '';

    /**
     * @param $newRealName
     */
    public function __construct($newRealName)
    {
        $this->setNewRealName($newRealName);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "SETNAME <new real name>";
    }

    /**
     * @param string $newRealName
     */
    public function setNewRealName($newRealName)
    {
        $this->newRealName = $newRealName;
    }

    /**
     * @return string
     */
    public function getNewRealName()
    {
        return $this->newRealName;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "SETNAME {$this->getNewRealName()}";
    }
} 
