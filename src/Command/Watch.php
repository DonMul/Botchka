<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Watch
 *
 * Adds or removes a user to a client's server-side friends list. More than one nickname may be specified in a
 * space-separated list, each item prefixed with a "+" or "-" to designate whether it is being added or removed.
 * Sending the command with no parameters returns the entries in the client's friends list.
 *
 * This command is not formally defined in an RFC, but is supported by most[which?] major IRC daemons. Support is
 * indicated in a RPL_ISUPPORT reply (numeric 005) with the WATCH keyword and the maximum number of entries a client
 * may have in its friends list. For example:
 *
 * :irc.server.net 005 WiZ WALLCHOPS WATCH=128 SILENCE=15 MODES=12 CHANTYPES=#
 */
final class Watch extends Command
{
    /**
     * @var string
     */
    protected $nicknames = '';

    /**
     * @param $nicknames
     */
    public function __construct($nicknames)
    {
        $this->setNicknames($nicknames);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "WATCH [+/-<nicknames>]";
    }

    /**
     * @param string $nicknames
     */
    public function setNicknames($nicknames)
    {
        $this->nicknames = $nicknames;
    }

    /**
     * @return string
     */
    public function getNicknames()
    {
        return $this->nicknames;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "WATCH {$this->getNickNames()}";
    }
} 
