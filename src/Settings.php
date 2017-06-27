<?php

namespace Botchka;

/**
 * Class Settings
 *
 * @package Botchka
 * @author Joost Mul <joost@jmul.net>
 */
final class Settings
{
    /**
     * The server to connect to.
     *
     * @var string
     */
    private $server;

    /**
     * The port the server is listening on. Usually it is something like 6697 or 6667
     * @var int
     */
    private $port;

    /**
     * Your prefered nickname.
     *
     * @var string
     */
    private $nick;

    /**
     * The password used for authentication with the NickServ and logging in.
     *
     * @var string
     */
    private $pass;

    /**
     * Additional data used by plugins.
     *
     * @var string[]
     */
    private $additionalData = [];

    /**
     * A collection on BasePlugin classes which are registered.
     *
     * @var BasePlugin[]
     */
    private $plugins = [];

    /**
     * Settings constructor.
     *
     * @param string $server                    URL/IP Address of the server to connect to
     * @param int    $port                      Port the IRC Server is hosted on
     * @param string $nick                      Nickname of the user to register
     * @param string $pass                      Possible password for the user
     * @param BasePlugin[] $registeredPlugins   List of registered plugins
     * @param string[] $additionalData          Additional config settings for possible plugins
     */
    public function __construct($server, $port, $nick, $pass = null, $registeredPlugins = [], $additionalData = [])
    {
        $this->setServer($server);
        $this->setPort($port);
        $this->setNick($nick);
        $this->setPass($pass);
        $this->setAdditionalData($additionalData);
        $this->setPlugins($registeredPlugins);
    }

    /**
     * Returns the address of the server
     *
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Sets the address of the server
     *
     * @param string $server
     */
    private function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * Returns the port of the server
     *
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Sets the port of the server
     *
     * @param int $port
     */
    private function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * Returns the preferred nickname
     *
     * @return string
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Sets the preferred nickname
     *
     * @param string $nick
     */
    private function setNick($nick)
    {
        $this->nick = $nick;
    }

    /**
     * Returns the password used for authentication
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Sets the password for authentication
     *
     * @param string $pass
     */
    private function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * Get all additional data used by plugins
     *
     * @return string[]
     */
    public function getAdditionalData()
    {
        return $this->additionalData;
    }

    /**
     * Sets all additoinal data used by plugins
     *
     * @param string[] $additionalData
     */
    private function setAdditionalData($additionalData)
    {
        $this->additionalData = $additionalData;
    }

    /**
     * Return all registered plugins
     *
     * @return BasePlugin[]
     */
    public function getPlugins()
    {
        return $this->plugins;
    }

    /**
     * Sets t[he registered plugins
     *
     * @param BasePlugin[] $plugins
     */
    private function setPlugins($plugins)
    {
        foreach ($plugins as $plugin) {
            $plugin->setSettings($this);
        }

        $this->plugins = $plugins;
    }

    /**
     * Get a setting for a specified plugin
     *
     * @param string $name      Name of the setting
     * @param mixed  $default   Defualt value if the setting is not set
     * @return mixed
     */
    public function getPluginSetting($name, $default = null)
    {
        return Util::arrayGet($this->getAdditionalData(), $name, $default);
    }

    /**
     * Returns whether or not the password should be used
     *
     * @return bool
     */
    public function shouldUsePassword()
    {
        $pass = $this->getPass();
        return $pass !== null && !empty($pass);
    }
}