<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Command_List
 * @author Joost Mul <joost@jmul.net>
 *
 * Lists all channels on the server. If the comma-separated list <channels> is given, it will return the channel topics.
 * If <server> is given, the command will be forwarded to <server> for evaluation.
 *
 * Defined in RFC 1459
 */
final class CommandList extends Command
{
    /**
     * @var string
     */
    protected $channels = '';

    /**
     * @var string
     */
    protected $server = '';

    /**
     * @param $channels
     * @param $server
     */
    public function __construct($channels, $server)
    {
        $this->setChannels($channels);
        $this->setServer($server);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "LIST [<channels> [<server>]]";
    }

    /**
     * @param string $channels
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;
    }

    /**
     * @return string
     */
    public function getChannels()
    {
        return $this->channels;
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
        return "LIST {$this->getChannels()} {$this->getServer()}";
    }
} 
