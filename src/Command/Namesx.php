<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Namesx
 * @author Joost Mul <joost@jmul.net>
 *
 * Instructs the server to send names in an RPL_NAMES reply prefixed with all their respective channel statuses instead
 * of just the highest one (similar to IRCv3's multi-prefix).
 *
 * For example:
 *
 * With NAMESX
 * :irc.server.net 353 Phyre = #SomeChannel :@+WiZ
 *
 * Without NAMESX
 * :irc.server.net 353 Phyre = #SomeChannel :@WiZ
 *
 * This command can ONLY be used if the NAMESX keyword is returned in an RPL_ISUPPORT (numeric 005) reply. It may also
 * be combined with the UHNAMES command.
 *
 * This command is not formally defined in an RFC, but is recognized by most major IRC daemons. The newer modern
 * approach is to use IRCv3 protocol extensions to activate the multi-prefix extension for the regular NAMES command.
 */
final class Namesx extends Command
{
    /**
     * @return string
     */
    public function __toString()
    {
        return "PROTOCTL NAMESX";
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "PROTOCTL NAMESX";
    }
} 
