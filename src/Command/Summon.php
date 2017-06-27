<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Summon
 * @author Joost Mul <oost@kwible.net>
 *
 * Gives users who are on the same host as <server> a message asking them to join IRC.
 *
 * Defined in RFC 1459; the optional <channel> parameter was added in RFC 2812
 */
final class Summon extends Command
{
    /**
     * @var string
     */
    protected $user = '';

    /**
     * @var string
     */
    protected $server = '';

    /**
     * @var string
     */
    protected $channel = '';

    /**
     * @param $channel
     * @param $server
     * @param $user
     */
    public function __construct($channel, $server, $user)
    {
        $this->setChannel($channel);
        $this->setServer($server);
        $this->setUser($user);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "SUMMON <user> [<server> [<channel>]]";
    }

    /**
     * @param string $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
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
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "SUMMON {$this->getUser()} {$this->getServer()} {$this->getChannel()}";
    }
} 
