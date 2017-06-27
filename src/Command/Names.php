<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Names
 * @author Joost Mul <joost@jmul.net>
 *
 * Returns a list of who is on the comma-separated list of <channels>, by channel name. If <channels> is omitted, all
 * users are shown, grouped by channel name with all users who are not on a channel being shown as part of channel "*".
 * If <server> is specified, the command is sent to <server> for evaluation.
 *
 * Defined in RFC 1459; the optional <server> parameter was added in RFC 2812.
 *
 * The response contains all nicknames in the channel prefixed with the highest channel status prefix of that user, for
 * example like this (with @ being the highest status prefix)
 *
 * :irc.server.net 353 Phyre = #SomeChannel :@WiZ
 * If a client wants to receive all the channel status prefixes of a user and not only their current highest one, the
 * IRCv3 multi-prefix extension can be enabled (@ is the channel operator prefix, and + the lower voice status prefix):
 *
 * :irc.server.net 353 Phyre = #SomeChannel :@+WiZ
 * See also NAMESX below for an alternate, older approach to achieve the same effect. However, by today most clients
 * and servers support the new IRCv3 standard.
 */
final class Names extends Command
{
    /**
     * @var string
     */
    protected $channels = '';
    /**
     * @var string
     */
    protected $server = '';

    /**
     * @param $channels
     * @param $server
     */
    public function __construct($channels, $server)
    {
        $this->setChannels($channels);
        $this->setServer($server);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "NAMES [<channels> [<server>]]";
    }

    /**
     * @param string $channels
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;
    }

    /**
     * @return string
     */
    public function getChannels()
    {
        return $this->channels;
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
        return "NAMES {$this->getChannels()} {$this->getServer()}";
    }
} 
