<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Pong
 * @author Joost Mul <joost@jmul.net>
 *
 * This command is a reply to the PING command and works in much the same way.
 *
 * Defined in RFC 1459
 */
final class Pong extends Command
{
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
        return "PONG <server1> [<server2>]";
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
        return "PONG {$this->getServer1()} {$this->getServer2()}";
    }
} 
