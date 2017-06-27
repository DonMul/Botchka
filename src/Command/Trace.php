<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Trace
 * @author Joost Mul <joost@jmul.net>
 *
 * Trace a path across the IRC network to a specific server or client, in a similar method to traceroute.
 *
 * Defined in RFC 1459
 */
final class Trace extends Command
{
    /**
     * @var string
     */
    protected $target = '';

    /**
     * @param $target
     */
    public function __construct($target)
    {
        $this->setTarget($target);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "TRACE [<target>]";
    }

    /**
     * @param string $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "TRACE {$this->getTarget()}";
    }
} 
