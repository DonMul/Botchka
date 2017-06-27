<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Wallops
 * @author Joost Mul <joost@jmul.net>
 *
 * Sends <message> to all operators connected to the server (RFC 1459), or all users with user mode 'w' set (RFC 2812).[52][53]
 *
 * Defined in RFC 1459
 */
final class Wallops extends Command
{
    /**
     * @var string
     */
    protected $message = '';

    /**
     * @param $message
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
        return "WALLOPS <message>";
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
        return "WALLOPS {$this->getMessage()}";
    }
} 
