<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Squit
 * @author Joost Mul <joost@jmul.net>
 *
 * Causes <server> to quit the network.
 *
 * Defined in RFC 1459
 */
final class Squit extends Command
{
    /**
     * @var string
     */
    protected $server = '';

    /**
     * @var string
     */
    protected $comment = '';

    /**
     * @param $server
     * @param $comment
     */
    public function __construct($server, $comment)
    {
        $this->setServer($server);
        $this->setComment($comment);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "SQUIT <server> <comment>";
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "SQUIT {$this->getServer()} {$this->getComment()}";
    }
}
