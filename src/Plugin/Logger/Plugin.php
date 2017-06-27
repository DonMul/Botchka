<?php

namespace Botchka\Plugin\Logger;

use Botchka\BasePlugin;
use Botchka\Command;

/**
 * Class Plugin
 *
 * @package Botchka\Plugin\Logger
 * @author Joost Mul <joost@jmul.net>
 */
final class Plugin extends BasePlugin
{
    const TAG_SEND = 'SEND';
    const TAG_REVEIVE = 'RECEIVE';

    /**
     * @param string $triggerName
     * @param array $data
     *
     * @return Command[]
     */
    public function fireTrigger($triggerName, $data = [])
    {
        $this->logMessage($triggerName, (string)$data['command']);
        return [];
    }

    /**
     * @param string $tag
     * @param string $message
     */
    public function logMessage($tag, $message)
    {
        $date = date("Y-m-d H:i:s");
        $whitespace = str_repeat(' ', min(30 - strlen($tag), 0));
        echo "[{$date}] [{$tag}]{$whitespace} {$message}" . PHP_EOL;
    }

    /**
     * @return string
     */
    public function getSettingsNamespace()
    {
        return 'logger';
    }
}