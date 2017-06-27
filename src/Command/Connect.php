<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Connect
 * @author Joost Mul <joost@jmul.net>
 *
 * Instructs the server <remote server> (or the current server, if <remote server> is omitted) to connect to
 * <target server> on port <port>.[3][4] This command should only be available to IRC Operators.
 *
 * Defined in RFC 1459; the <port> parameter became mandatory in RFC 2812
 */
final class Connect extends Command
{
    /**
     * @var string
     */
    protected $server = '';

    /**
     * @var string
     */
    protected $port = '';

    /**
     * @var string
     */
    protected $remoteServer = '';

    /**
     * @param $port
     * @param $remoteServer
     * @param $server
     */
    public function __construct($server, $port, $remoteServer)
    {
        $this->setServer($server);
        $this->setPort($port);
        $this->setRemoteServer($remoteServer);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "CONNECT <target server> <port> [<remote server>]";
    }

    /**
     * @param string $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param string $remoteServer
     */
    public function setRemoteServer($remoteServer)
    {
        $this->remoteServer = $remoteServer;
    }

    /**
     * @return string
     */
    public function getRemoteServer()
    {
        return $this->remoteServer;
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
        return "CONNECT {$this->getServer()} {$this->getPort()} {$this->getRemoteServer()}";
    }
} 
