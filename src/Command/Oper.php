<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Oper
 * @author Joost Mul <joost@jmul.net>
 *
 * Authenticates a user as an IRC operator on that server/network.
 *
 * Defined in RFC 1459
 */
final class Oper extends Command
{
    /**
     * @var string
     */
    protected $username = '';

    /**
     * @var string
     */
    protected $password = '';

    /**
     * @param $password
     * @param $username
     */
    public function __construct($username, $password)
    {
        $this->setUsername($username);
        $this->setPassword($password);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "OPER <username> <password>";
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "OPER {$this->getUsername()} {$this->getPassword()}";
    }
} 
