<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Whowas
 * @author Joost Mul <joost@jmul.net>
 *
 * Used to return information about a nickname that is no longer in use (due to client disconnection, or nickname
 * changes). If given, the server will return information from the last <count> times the nickname has been used. If
 * <server> is given, the command is forwarded to it for processing. In RFC 2812, <nickname> can be a comma-separated
 * list of nicknames.
 *
 * Defined in RFC 1459
 */
final class Whowas extends Command
{
    /**
     * @var string
     */
    protected $nickname = '';

    /**
     * @var string
     */
    protected $count = '';

    /**
     * @var string
     */
    protected $server = '';

    /**
     * @param $count
     * @param $nickname
     * @param $server
     */
    public function __construct($nickname, $count, $server)
    {
        $this->setNickname($nickname);
        $this->setCount($count);
        $this->setServer($server);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "WHOWAS <nickname> [<count> [<server>]]";
    }

    /**
     * @param string $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return string
     */
    public function getCount()
    {
        return $this->count;
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
        return "WHOWAS {$this->getNickName()} {$this->getCount()} {$this->getServer()}";
    }
} 
