<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Command_Kill
 * @author Joost Mul <jmul@transip.nl>
 *
 * Forcibly removes <client> from the network.[13] This command may only be issued by IRC operators.
 *
 * Defined in RFC 1459
 */
final class Kill extends Command
{
    /**
     * @var string
     */
    protected $client = '';

    /**
     * @var string
     */
    protected $comment = '';

    /**
     * @param $client
     * @param $comment
     */
    public function __construct($client, $comment)
    {
        $this->setClient($client);
        $this->setComment($comment);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "KILL <client> <comment>";
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
     * @return string
     */
    public function __toString()
    {
        return "KILL {$this->getClient()} {$this->getComment()}";
    }
} 
