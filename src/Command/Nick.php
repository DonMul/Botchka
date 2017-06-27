<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Command_Nick
 * @author Joost Mul <joost@jmul.net>
 *
 * Allows a client to change their IRC nickname. Hopcount is for use between servers to specify how far away a nickname
 * is from its home server.
 *
 * Defined in RFC 1459; the optional <hopcount> parameter was removed in RFC 2812
 */
final class Nick extends Command
{
    /**
     * @var string
     */
    protected $nickName = '';

    /**
     * @param $nickName
     */
    public function __construct($nickName)
    {
        $this->setNickName($nickName);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "NICK <nickname>";
    }

    /**
     * @param string $nickName
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;
    }

    /**
     * @return string
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "NICK {$this->getNickName()}";
    }
} 
