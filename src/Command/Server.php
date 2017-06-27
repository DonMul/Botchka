<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Server
 * @author Joost Mul <joost@jmul.net>
 *
 * The server message is used to tell a server that the other end of a new connection is a server.[36] This message is
 * also used to pass server data over whole net. <hopcount> details how many hops (server connections) away <servername>
 * is. <info> contains addition human-readable information about the server.
 */
final class Server extends Command
{
    /**
     * @var string
     */
    protected $serverName = '';

    /**
     * @var string
     */
    protected $hopCount = '';

    /**
     * @var string
     */
    protected $info = '';

    /**
     * @param $hopCount
     * @param $info
     * @param $serverName
     */
    public function __construct($serverName, $hopCount, $info)
    {
        $this->setServerName($serverName);
        $this->setHopCount($hopCount);
        $this->setInfo($info);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "SERVER <servername> <hopcount> <info>";
    }

    /**
     * @param string $hopCount
     */
    public function setHopCount($hopCount)
    {
        $this->hopCount = $hopCount;
    }

    /**
     * @return string
     */
    public function getHopCount()
    {
        return $this->hopCount;
    }

    /**
     * @param string $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param string $serverName
     */
    public function setServerName($serverName)
    {
        $this->serverName = $serverName;
    }

    /**
     * @return string
     */
    public function getServerName()
    {
        return $this->serverName;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "SERVER {$this->getServerName()} {$this->getHopCount()} {$this->getInfo()}";
    }
} 
