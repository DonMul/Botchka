<?php

namespace Botchka\Plugin\Help;

use Botchka\BasePlugin;
use Botchka\Bot;
use Botchka\Command;
use Botchka\IncommingCommand;

/**
 * Class Plugin
 * @package Botchka\Plugin\Help
 */
class Plugin extends BasePlugin
{
    const TRIGGER_HELP = 'help';

    public function fireTrigger($triggerName, $data = [])
    {
        if ($triggerName == self::TRIGGER_HELP) {
            return $this->showHelp($data['command']);
        }

        return [];
    }

    private function showHelp(IncommingCommand $command)
    {
        $target = $command->getUser();
        if ($command->isSaidInChannel()) {
            $target = $command->getChannel();
        }

        $commands = [
            new Command\Privmsg($target, "Botchka version " . Bot::VERSION)
        ];

        $text = $command->getText();
        $functions = [];
        foreach ($this->getRegisteredPlugins() as $plugin) {
            $functions = array_merge($functions, $plugin->getRegisteredFunctions());
        }

        if (!empty($text)) {
            if (in_array($text, $functions)) {
                $explanationFound = false;
                foreach ($this->getRegisteredPlugins() as $plugin) {
                    $helpText = $plugin->getHelpForFunction($text);
                    if (!empty($helpText)) {
                        $explanationFound = true;
                        $commands[] = new Command\Privmsg($target, $helpText);
                    }
                }

                if (!$explanationFound) {
                    $commands[] = new Command\Privmsg($target, "No help implemented for {$text}");
                }
            } else {
                $commands[] = new Command\Privmsg($target, "Unknown command {$text}");
            }
        } else {
            $commands[] = new Command\Privmsg($target, "Available functions: " . implode(' ', $functions));
            $commands[] = new Command\Privmsg($target, "For an explanation, use !help <function>");
        }

        return $commands;
    }

    /**
     * @return string
     */
    protected function getSettingsNamespace()
    {
        return 'help';
    }

    public function getRegisteredFunctions()
    {
        return [
            self::TRIGGER_HELP
        ];
    }
}