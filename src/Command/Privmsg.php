<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Privmsg
 * @author Joost Mul <joost@jmul.net>
 *
 * Sends <message> to <msgtarget>, which is usually a user or channel.
 *
 * Defined in RFC 1459
 */
final class Privmsg extends Command
{
    /**
     * @var string
     */
    protected $messageTarget = '';

    /**
     * @var string
     */
    protected $message = '';

    /**
     * @param $messageTarget
     * @param $message
     */
    public function __construct($messageTarget, $message)
    {
        $this->setMessage($message);
        $this->setMessageTarget($messageTarget);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "PRIVMSG <msgtarget> <message>";
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = ':' . $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $messageTarget
     */
    public function setMessageTarget($messageTarget)
    {
        $this->messageTarget = $messageTarget;
    }

    /**
     * @return string
     */
    public function getMessageTarget()
    {
        return $this->messageTarget;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "PRIVMSG {$this->getMessageTarget()} {$this->getMessage()}";
    }
} 
