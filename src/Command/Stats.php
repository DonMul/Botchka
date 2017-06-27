<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Stats
 * @author Joost Mul <joost@jmul.net>
 *
 * Returns statistics about the current server, or <server> if it's specified.
 *
 * Defined in RFC 1459
 */
final class Stats extends Command
{
    /**
     * @var string
     */
    protected $query = '';

    /**
     * @var string
     */
    protected $server = '';

    /**
     * @param $server
     * @param $stats
     */
    public function __construct($query, $server)
    {
        $this->setQuery($query);
        $this->setServer($server);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "STATS <query> [<server>]";
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
     * @param string $stats
     */
    public function setQuery($stats)
    {
        $this->query = $stats;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "STATS {$this->getQuery()} {$this->getServer()}";
    }
} 
