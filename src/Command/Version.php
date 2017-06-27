<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Version
 * @author Joost Mul <joost@jmul.net>
 *
 * Returns the version of <server>, or the current server if omitted.
 *
 * Defined in RFC 1459
 */
final class Version extends Command
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
        return "VERSION [<server>]";
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
        return "VERSION {$this->getServer()}";
    }
} 
