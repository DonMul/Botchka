<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Silence
 * @author Joost Mul <joost@jmul.net>
 *
 * Adds or removes a host mask to a server-side ignore list that prevents matching users from sending the client
 * messages. More than one mask may be specified in a space-separated list, each item prefixed with a "+" or "-" to
 * designate whether it is being added or removed. Sending the command with no parameters returns the entries in the c
 * lient's ignore list.
 *
 * This command is not formally defined in an RFC, but is supported by most major IRC daemons. Support is
 * indicated in a RPL_ISUPPORT reply (numeric 005) with the SILENCE keyword and the maximum number of entries a client
 * may have in its ignore list. For example:
 *
 * :irc.server.net 005 WiZ WALLCHOPS WATCH=128 SILENCE=15 MODES=12 CHANTYPES=#
 */
final class Silence extends Command
{
    /**
     * @var string
     */
    protected $hostmask = '';

    /**
     * @param $hostmask
     */
    public function __construct($hostmask)
    {
        $this->setHostmask($hostmask);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "SILENCE [=/- <hostmask>]";
    }

    /**
     * @param string $hostmask
     */
    public function setHostmask($hostmask)
    {
        $this->hostmask = $hostmask;
    }

    /**
     * @return string
     */
    public function getHostmask()
    {
        return $this->hostmask;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "SILENCE {$this->getHostMask()}";
    }
} 
