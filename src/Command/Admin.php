<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Admin
 * @author Joost Mul <joost@jmul.net>
 *
 * Instructs the server to return information about the administrator of the server specified by <server>, or the
 * current server if target is omitted
 */
final class Admin extends Command
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
        return "ADMIN [<servers>]";
    }

    /**
     * @param string $server
     */
    public function setServer($server)
    {
        $this->server = (string)$server;
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
        return "ADMIN {$this->getServer()}";
    }
}
