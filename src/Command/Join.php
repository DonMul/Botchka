<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Command_Join
 * @author Joost Mul <joost@jmul.net>
 *
 * Makes the client join the channels in the comma-separated list <channels>, specifying the passwords, if needed, in
 * the comma-separated list <keys>. If the channel(s) do not exist then they will be created.
 *
 * Defined in RFC 1459
 */
final class Join extends Command
{
    /**
     * @var string
     */
    protected $channels = '';

    /**
     * @var string
     */
    protected $keys = '';

    /**
     * @param $channels
     * @param $keys
     */
    public function __construct($channels, $keys)
    {
        $this->setChannels($channels);
        $this->setKeys($keys);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "JOIN <channels> [<keys>]";
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
     * @param string $keys
     */
    public function setKeys($keys)
    {
        $this->keys = $keys;
    }

    /**
     * @return string
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "JOIN {$this->getChannels()} {$this->getKeys()}";
    }
} 
