<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Servlist
 * @author Joost Mul <joost@jmul.net>
 *
 * Lists the services currently on the network.
 *
 * Defined in RFC 2812
 */
final class Servlist extends Command
{
    /**
     * @var string
     */
    protected $mask = '';

    /**
     * @var string
     */
    protected $type = '';

    /**
     * @param $mask
     * @param $type
     */
    public function __construct($mask, $type)
    {
        $this->setMask($mask);
        $this->setType($type);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "SERVLIST [<mask> [<type>]]";
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
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "SERVLIST {$this->getMask()} {$this->getType()}";
    }
} 
