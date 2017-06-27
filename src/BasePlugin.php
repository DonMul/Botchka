<?php

namespace Botchka;
use Botchka\Command\Connect;

/**
 * Class BasePlugin
 * @package Botchka
 * @author Joost Mul <joost@jmul.net>
 */
abstract class BasePlugin
{
    /**
     * The settings used by this plugin
     *
     * @var Settings
     */
    private $settings;

    /**
     * Sets the settings used by this plugin
     *
     * @param Settings $settings
     */
    public function setSettings(Settings $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Returns a plugin setting found with the given name
     *
     * @param string $name
     * @param mixed  $default
     * @return mixed
     */
    protected final function getSetting($name, $default = null)
    {
        if (!($this->settings instanceof Settings)) {
            $this->settings = new Settings('', '', '', null);
        }

        if (!is_array($name)) {
            $name = [$name];
        }

        array_unshift($name, $this->getSettingsNamespace());

        return $this->settings->getPluginSetting($name, $default);
    }

    /**
     * @return BasePlugin[]
     */
    protected function getRegisteredPlugins()
    {
        if (!($this->settings instanceof Settings)) {
            $this->settings = new Settings('', '', '', null);
        }

        return $this->settings->getPlugins();
    }

    /**
     * Fires the trigger with the given name
     *
     * @param string $triggerName
     * @param array  $data
     * @return Command[]
     */
    public abstract function fireTrigger($triggerName, $data = []);

    /**
     * @return string
     */
    protected abstract function getSettingsNamespace();

    /**
     * @return string[]
     */
    public function getRegisteredFunctions()
    {
        return [];
    }

    /**
     * @param string $functionName
     * @return string
     */
    public function getHelpForFunction($functionName)
    {
        return '';
    }
}