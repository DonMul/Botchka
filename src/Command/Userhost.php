<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Userhost
 *
 * Returns a list of information about the nicknames specified.
 *
 * Defined in RFC 1459
 */
final class Userhost extends Command
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
    public function getSyntax()
    {
        return "USERHOST <nickname> [<nickname> <nickname> ...]";
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
        return "USERHOST {$this->getNickName()}";
    }
} 
