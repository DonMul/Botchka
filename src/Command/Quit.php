<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Quit
 * @author Joost Mul <joost@jmul.net>
 *
 * Disconnects the user from the server.
 *
 * Defined in RFC 1459
 */
final class Quit extends Command
{
    /**
     * @var string
     */
    protected $message = '';

    /**
     * @param $message
     */
    function __construct($message)
    {
        $this->setMessage($message);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "QUIT [<message>]";
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
        return "QUIT {$this->getMessage()}";
    }
} 
