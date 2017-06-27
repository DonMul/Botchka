<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Time
 * @author Joost Mul <joost@jmul.net>
 *
 * Returns the local time on the current server, or <server> if specified.
 *
 * Defined in RFC 1459
 */
final class Time extends Command
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
        return "TIME [<server>]";
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
        return "TIME {$this->getServer()}";
    }
} 
