<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Kick
 * @author Joost Mul <joost@jmul.net>
 *
 * Forcibly removes <client> from <channel>.[12] This command may only be issued by channel operators.
 *
 * Defined in RFC 1459
 */
final class Kick extends Command
{
    /**
     * @var string
     */
    protected $channel = '';

    /**
     * @var string
     */
    protected $client = '';

    /**
     * @var string
     */
    protected $message = '';

    /**
     * @param $channel
     * @param $client
     * @param $message
     */
    public function __construct($channel, $client, $message)
    {
        $this->setChannel($channel);
        $this->setClient($client);
        $this->setMessage($message);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "KICK <channel> <client> [<message>]";
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
     * @param string $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getClient()
    {
        return $this->client;
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
        return "KICK {$this->getChannel()} {$this->getClient()} {$this->getMessage()}";
    }
} 
