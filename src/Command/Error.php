<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Error
 * @author Joost Mul <joost@jmul.net>
 *
 * This command is for use by servers to report errors to other servers. It is also used before terminating client
 * connections.
 *
 * Defined in RFC 1459
 */
final class Error extends Command
{
    /**
     * @var string
     */
    protected $message = '';

    /**
     * @param string $meesage
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
        return "ERROR <error message>";
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
        return "ERROR {$this->getMessage()}";
    }
} 
