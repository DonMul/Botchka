<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Ping
 * @author Joost Mul <joost@jmul.net>
 *
 *Tests the presence of a connection. A PING message results in a PONG reply. If <server2> is specified, the message
 * gets passed on to it.
 *
 * Defined in RFC 1459
 */
final class Ping extends Command
{
    const RAWNAME = 'PING';

    /**
     * @var string
     */
    protected $server1 = '';

    /**
     * @var string
     */
    protected $server2 = '';

    /**
     * @param $server1
     * @param $server2
     */
    public function __construct($server1, $server2)
    {
        $this->setServer1($server1);
        $this->setServer2($server2);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "PING <server1> [<server2>]";
    }

    /**
     * @param string $server1
     */
    public function setServer1($server1)
    {
        $this->server1 = $server1;
    }

    /**
     * @return string
     */
    public function getServer1()
    {
        return $this->server1;
    }

    /**
     * @param string $server2
     */
    public function setServer2($server2)
    {
        $this->server2 = $server2;
    }

    /**
     * @return string
     */
    public function getServer2()
    {
        return $this->server2;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "PING {$this->getServer1()} {$this->getServer2()}";
    }
} 
