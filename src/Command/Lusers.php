<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Lusers
 * @author Joost Mul <joost@jmul.net>
 *
 * Returns statistics about the size of the network.[16] If called with no arguments, the statistics will reflect the
 * entire network. If <mask> is given, it will return only statistics reflecting the masked subset of the network. If
 * <target> is given, the command will be forwarded to <server> for evaluation.
 *
 * Defined in RFC 2812
 */
final class Lusers extends Command
{
    /**
     * @var string
     */
    protected $mask = '';

    /**
     * @var string
     */
    protected $server = '';

    /**
     * @param $mask
     * @param $server
     */
    public function __construct($mask, $server)
    {
        $this->setMask($mask);
        $this->setServer($server);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "LUSERS [<mask> [<server>]]";
    }

    /**
     * @param string $mask
     */
    public function setMask($mask)
    {
        $this->mask = $mask;
    }

    /**
     * @return string
     */
    public function getMask()
    {
        return $this->mask;
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
        return "LUSERS {$this->getMask()} {$this->getServer()}";
    }
} 
