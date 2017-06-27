<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Ison
 * @author Joost Mul <joost@jmul.net>
 *
 * Queries the server to see if the clients in the space-separated list <nicknames> are currently on the network.
 * The server returns only the nicknames that are on the network in a space-separated list. If none of the clients are
 * on the network the server returns an empty list.
 *
 * Defined in RFC 1459
 */
final class Ison extends Command
{
    /**
     * @var string
     */
    protected $nicknames = '';

    /**
     * @param $nicknames
     */
    public function __construct($nicknames)
    {
        $this->setNicknames($nicknames);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "ISON <nicknames>";
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
     * @return string
     */
    public function __toString()
    {
        return "ISON {$this->getNickNames()}";
    }
} 
