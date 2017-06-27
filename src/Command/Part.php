<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Part
 * @author Joost Mul <joost@jmul.net>
 *
 * Causes a user to leave the channels in the comma-separated list <channels>.
 *
 * Defined in RFC 1459
 */
final class Part extends Command
{
    /**
     * @var string
     */
    protected $channels = '';

    /**
     * @var string
     */
    protected $message = '';

    /**
     * @param $channels
     * @param $message
     */
    public function __construct($channels, $message)
    {
        $this->setChannels($channels);
        $this->setMessage($message);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "PART <channels> [<message>]";
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
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "PART {$this->getChannels()} {$this->getMessage()}";
    }
} 
