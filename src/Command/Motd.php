<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Motd
 * @author Joost Mul <joost@jmul.net>
 *
 * Returns the message of the day on <server> or the current server if it is omitted.
 *
 * Defined in RFC 2812
 */
final class Motd extends Command
{
    /**
     * @var string
     */
    protected $server = '';

    /**
     * @param $motd
     */
    public function __construct($motd)
    {
        $this->setServer($motd);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "MOTD [<server>]";
    }

    /**
     * @param string $motd
     */
    public function setServer($motd)
    {
        $this->server = $motd;
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
        return "MOTD {$this->getServer()}";
    }
} 
