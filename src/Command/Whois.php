<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Whois
 * @author Joost Mul <joost@jmul.net>
 *
 * Returns information about the comma-separated list of nicknames masks <nicknames>. If <server> is given, the command
 * is forwarded to it for processing.
 *
 * Defined in RFC 1459
 */
final class Whois extends Command
{
    /**
     * @var string
     */
    protected $server = '';

    /**
     * @var string
     */
    protected $nicknames = '';

    /**
     * @param $nicknames
     * @param $server
     */
    public function __construct($server, $nicknames)
    {
        $this->setServer($server);
        $this->setNicknames($nicknames);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "WHOIS [<server>] <nicknames>";
    }

    /**
     * @param string $nicknames
     */
    public function setNicknames($nicknames)
    {
        $this->nicknames = $nicknames;
    }

    /**
     * @return string
     */
    public function getNicknames()
    {
        return $this->nicknames;
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
        return "WHOIS {$this->getServer()} {$this->getNicknames()}";
    }
} 
