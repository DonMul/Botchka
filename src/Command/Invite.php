<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Invite
 * @author Joost Mul <joost@jmul.net>
 *
 * Invites <nickname> to the channel <channel>.[9] <channel> does not have to exist, but if it does, only members of the
 * channel are allowed to invite other clients. If the channel mode i is set, only channel operators may invite other
 * clients.
 *
 * Defined in RFC 1459
 */
final class Invite extends Command
{
    /**
     * @var string
     */
    protected $nickname = '';

    /**
     * @var string
     */
    protected $channel = '';

    /**
     * @param $nickname
     * @param $channel
     */
    public function __construct($nickname, $channel)
    {
        $this->setNickname($nickname);
        $this->setChannel($channel);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "INVITE <nickname> <channel>";
    }

    /**
     * @param string $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
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
        return "INVITE {$this->getNickName()} {$this->getChannel()}";
    }
} 
