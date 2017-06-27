<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class User
 *
 * This command is used at the beginning of a connection to specify the username, hostname, real name and initial user
 * modes of the connecting client.[47][48] <realname> may contain spaces, and thus must be prefixed with a colon.
 *
 * Defined in RFC 1459, modified in RFC 2812
 */
final class User extends Command
{
    /**
     * @var string
     */
    protected $user = '';

    /**
     * @var string
     */
    protected $mode = '';

    /**
     * @var string
     */
    protected $realname = '';

    /**
     * @param $mode
     * @param $realname
     * @param $user
     */
    function __construct($user, $mode, $realname)
    {
        $this->setUser($user);
        $this->setMode($mode);
        $this->setRealname($realname);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "USER <user> <mode> <unused> <realname>";
    }

    /**
     * @param string $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $realname
     */
    public function setRealname($realname)
    {
        $this->realname = $realname;
    }

    /**
     * @return string
     */
    public function getRealname()
    {
        return $this->realname;
    }

    /**
     * @param string $username
     */
    public function setUser($username)
    {
        $this->user = $username;
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
        return "USER {$this->getUser()} botcha {$this->getUser()} :{$this->getRealName()}";
    }
} 
