<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Users
 * @author Joost Mul <joost@jmul.net>
 *
 * Returns a list of users and information about those users in a format similar to the UNIX commands who, rusers and
 * finger.
 *
 * Defined in RFC 1459
 */
final class Users extends Command
{
    /**
     * @var string
     */
    protected $server = '';

    /**
     * @param $server
     */
    public function __construct($server)
    {
        $this->setServer($server);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "USERS [<server>]";
    }

    /**
     * @param string $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "USERS {$this->getServer()}";
    }
} 
