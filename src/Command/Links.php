<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Command_Links
 * #author Joost Mul <joost@jmul.net>
 *
 * Lists all server links matching <server mask>, if given, on <remote server>, or the current server if omitted.
 * Defined in RFC 1459
 */
final class Links extends Command
{
    /**
     * @var string
     */
    protected $remoteServer = '';

    /**
     * @var string
     */
    protected $serverMask = '';

    /**
     * @param $remoteServer
     * @param $serverMask
     */
    public function __construct($remoteServer, $serverMask)
    {
        $this->setRemoteServer($remoteServer);
        $this->setServerMask($serverMask);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "LINKS [<remote server> [<server mask>]]";
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
     * @param string $serverMask
     */
    public function setServerMask($serverMask)
    {
        $this->serverMask = $serverMask;
    }

    /**
     * @return string
     */
    public function getServerMask()
    {
        return $this->serverMask;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "LINKS {$this->getRemoteServer()} {$this->getServerMask()}";
    }
} 
