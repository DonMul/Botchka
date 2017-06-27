<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Command_Knock
 * @author Joost Mul <joost@jmul.net>
 *
 * Sends a NOTICE to an invitation-only <channel> with an optional <message>, requesting an invite.
 *
 * This command is not formally defined by an RFC, but is supported by most major IRC daemons. Support is indicated in a
 * RPL_ISUPPORT reply (numeric 005) with the KNOCK keyword.
 */
final class Knock extends Command
{
    /**
     * @var string
     */
    protected $channel = '';

    /**
     * @var string
     */
    protected $message = '';

    /**
     * @param $channel
     * @param $message
     */
    public function __construct($channel, $message)
    {
        $this->setChannel($channel);
        $this->setMessage($message);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "KNOCK <channel> [<message>}";
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
        return "KNOCK {$this->getChannel()} {$this->getMessage()}";
    }
} 
