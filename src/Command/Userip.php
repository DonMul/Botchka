<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Userip
 * @author Joost Mul <joost@jmul.net>
 *
 * Requests the direct IP address of the user with the specified nickname.
 *
 * This command is often used to obtain the IP of an abusive user to more effectively perform a ban. It is unclear what,
 * if any, privileges are required to execute this command on a server.
 *
 * This command is not formally defined by an RFC, but is in use by some IRC daemons. Support is indicated in a
 * RPL_ISUPPORT reply (numeric 005) with the USERIP keyword.
 */
final class Userip extends Command
{
    /**
     * @var string
     */
    protected $nickname = '';

    /**
     * @param $nickname
     */
    public function __construct($nickname)
    {
        $this->setNickname($nickname);
    }

    /**
     * @return string
     */
    public function getString()
    {
        return "USERIP <nickname>";
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "USERIP {$this->getNickname()}";
    }

    public function getSyntax()
    {
        return "USERHOST <nickname>";
    }
}
