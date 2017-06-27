<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Mode
 * @author Joost Mul <joost@jmul.net>
 *
 * The MODE command is dual-purpose. It can be used to set both user and channel modes.
 *
 * Defined in RFC 1459
 */
final class Mode
{
    /**
     * @var string
     */
    protected $nickName = '';

    /**
     * @var string
     */
    protected $flags = '';

    /**
     * @var string
     */
    protected $user = '';

    /**
     * @param $flags
     * @param $nickName
     * @param $user
     */
    public function __construct($nickname, $flags, $user)
    {
        $this->setNickName($nickname);
        $this->setFlags($flags);
        $this->setUser($user);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "MODE <nickname> <flags> (user)";
    }

    /**
     * @param string $flags
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;
    }

    /**
     * @return string
     */
    public function getFlags()
    {
        return $this->flags;
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
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "MODE {$this->getNickName()} {$this->getFlags()} {$this->getUser()}";
    }
} 
