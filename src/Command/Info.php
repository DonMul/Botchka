<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Info
 * @author Joost Mul <joost@jmul.net
 *
 * Returns information about the <target> server, or the current server if <target> is omitted.[8] Information returned
 * includes the server's version, when it was compiled, the patch level, when it was started, and any other information
 * which may be considered to be relevant.
 *
 * Defined in RFC 1459
 */
final class Info extends Command
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
        return "INFO [<target>]";
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
        return "INFO {$this->getTarget()}";
    }
} 
