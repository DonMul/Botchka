<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Away
 * @author Joost Mul <joost@jmul.net>
 *
 * Provides the server with a message to automatically send in reply to a PRIVMSG directed at the user, but not to a
 * channel they are on.[2] If <message> is omitted, the away status is removed. Defined in RFC 1459
 */
final class Away extends Command
{
    /**
     * @var string
     */
    protected $message = '';

    /**
     * @param string $message
     */
    public function __construct($message)
    {
        $this->setMessage($message);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "AWAY [<message>]";
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
        return "AWAY {$this->getMessage()}";
    }
} 
