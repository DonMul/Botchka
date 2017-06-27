<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Notice
 * @author Joost Mul <jost@kwible.net>
 *
 * This command works similarly to PRIVMSG, except automatic replies must never be sent in reply to NOTICE messages
 *
 * Defined in RFC 1459
 */
final class Notice extends Command
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
     * @param $message
     * @param $messageTarget
     */
    public function __construct($messageTarget, $message)
    {
        $this->setMessageTarget($messageTarget);
        $this->setMessage($message);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "NOTICE <msgtarget> <message>";
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
        return "NOTICE {$this->getMessageTarget()} {$this->getMessage()}";
    }
} 
