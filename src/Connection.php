<?php

namespace Botchka;

/**
 * Class Connection
 * @package Botchka
 * @author Joost Mul <joost@jmul.net>
 */
final class Connection
{
    /**
     * The settings used for connection
     *
     * @var Settings Settings
     */
    private $settings;

    /**
     * The socket usec to interact with the server
     *
     * @var resource
     */
    private $connection;

    /**
     * Connection constructor.
     *
     * @param Settings $settings
     */
    public function __construct(Settings $settings)
    {
        $this->setSettings($settings);
    }

    /**
     * Ensures the connection is open and returns it
     *
     * @return resource
     * @throws \Exception
     */
    private function getConnection()
    {
        if (!is_resource($this->connection)) {
            $this->connection = fsockopen($this->settings->getServer(), $this->settings->getPort());

            if ($this->connection) {
                stream_set_blocking($this->connection, false);
                stream_set_timeout($this->connection, 1);
            }

            if ($this->connection == false) {
                throw new \Exception("Could not open socket to IRC server");
            }
        }

        return $this->connection;
    }

    /**
     * Returns the settings used for connection
     *
     * @return Settings
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Sets the settings used for connection
     *
     * @param Settings $settings
     */
    private function setSettings(Settings $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Sends a command to the server
     *
     * @param Command $data
     */
    public function sendData(Command $data)
    {
        $command = $data->toString();
        fputs($this->getConnection(), $command. "\r\n");
    }

    /**
     * Checks whether the server send smome data. If so, return those commands
     *
     * @return IncommingCommand
     */
    public function getData()
    {
        $data = stream_get_contents($this->getConnection(), 1024);
        $data = trim($data);
        flush();

        if (!empty($data)) {
            return new IncommingCommand($data);
        }

        return null;
    }
}