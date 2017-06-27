<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Uhnames
 * @author Joost Mul <joost@jmul.net>
 *
 * Instructs the server to send names in an RPL_NAMES reply in the long format:
 *
 * With UHNAMES
 * :irc.server.net 353 Phyre = #SomeChannel :WiZ!user@somehost
 *
 * Without UHNAMES
 * :irc.server.net 353 Phyre = #SomeChannel :WiZ
 * This command can ONLY be used if the UHNAMES keyword is returned in an RPL_ISUPPORT (numeric 005) reply. It may also
 * be combined with the NAMESX command.
 *
 * This command is not formally defined in an RFC, but is recognized by most major IRC daemons.
 */
final class Uhnames extends Command
{
    /**
     * @return string
     */
    public function __toString()
    {
        return "PROTOCTL UHNAMES";
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "PROTOCTL UHNAMES";
    }
} 
