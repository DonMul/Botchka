<?php

namespace Botchka\Plugin\AutoJoin;

use Botchka;
use Botchka\Command\Join;

/**
 * Class Plugin
 *
 * @package Botchka\Plugin\AutoJoin
 * @author Joost Mul <joost@jmul.net>
 */
final class Plugin extends Botchka\BasePlugin
{
    /**
     * @param string $triggerName
     * @param array $data
     *
     * @return Botchka\Command[]
     */
    public function fireTrigger($triggerName, $data = [])
    {
        if ($triggerName == \Botchka\Bot::TRIGGER_CONNECTED) {
            return $this->onConnect($data);
        }

        return [];
    }

    /**
     * @param array $data
     * @return array
     */
    private function onConnect($data)
    {
        $commands = [];
        foreach ($this->getSetting('channels', []) as $channel => $key) {
            $commands[] = new Join($channel, $key);
        }

        return $commands;
    }

    /**
     * @return string
     */
    public function getSettingsNamespace()
    {
        return 'autoJoin';
    }
}