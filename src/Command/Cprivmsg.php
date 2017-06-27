<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Cprivmsg
 * @author Joost Mul <joost@jmul.net>
 *
 * Sends a private message to <nickname> on <channel> that bypasses flood protection limits. The target nickname must
 * be in the same channel as the client issuing the command, and the client must be a channel operator.
 *
 * Normally an IRC server will limit the number of different targets a client can send messages to within a certain
 * time frame to prevent spammers or bots from mass-messaging users on the network, however this command can be used
 * by channel operators to bypass that limit in their channel. For example, it is often used by help operators that may
 * be communicating with a large number of users in a help channel at one time.
 *
 * This command is not formally defined in an RFC, but is in use by some IRC networks. Support is indicated in a
 * RPL_ISUPPORT reply (numeric 005) with the CPRIVMSG keyword
 */
final class Cprivmsg extends Command
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
     * @var string
     */
    protected $message = '';

    /**
     * @param $channel
     * @param $message
     * @param $nickname
     */
    public function __construct($nickname, $channel, $message)
    {
        $this->setNickname($nickname);
        $this->setChannel($channel);
        $this->setMessage($message);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "CPRIVMMSG <nickname> <channel> :<message>";
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
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
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
        return "CPRIVMSG {$this->getNickName()} {$this->getChannel()} :{$this->getMessage()}";
    }
} 
