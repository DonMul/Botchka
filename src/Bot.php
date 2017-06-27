<?php

namespace Botchka;

use Botchka\Command\Ping;
use Botchka\Command\Pong;

/**
 * Class Bot
 *
 * The class this bot is all about.
 *
 * @author Joost Mul <joost@jmul.net>
 */
final class Bot
{
    const TRIGGER_CONNECTED = 'connected';
    const TRIGGER_RECEIVE = 'receiveData';
    const TRIGGER_SEND = 'sendData';
    const VERSION = 0.1;

    /**
     * Object containing all settings used by this IRC bot
     *
     * @var Settings $config
     */
    private $config = [];

    /**
     * The connection used to interact with the IRC server
     *
     * @var Connection $connection
     */
    private $connection;

    /**
     * Bot constructor.
     *
     * @param Settings $settings
     */
    public function __construct(Settings $settings)
    {
        $this->setConfig($settings);
        $this->connection = new Connection($settings);
    }

    /**
     * Starts up the bot
     */
    public function start()
    {
        $this->login();

        // Ensuring the server can send some responses to the login commands before trying to actually connect
        sleep(1);

        $this->loop();
        $this->fireTrigger(self::TRIGGER_CONNECTED);
        $this->loop();

        while (true) {
            $this->loop();
        }
    }

    /**
     * Sets the settings used by the connection and plugins
     *
     * @param Settings $config
     */
    private function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * Logs in to the server
     */
    private function login()
    {
        // Checks whether or not the password is set. If so, authenticate with the password
        if ($this->config->shouldUsePassword()) {
            $this->sendData(new Command\Pass($this->config->getPass()));
        }

        // Send the User and Nick commands
        $this->sendData(new Command\User($this->config->getNick(), $this->config->getNick(), $this->config->getNick()));
        $this->sendData(new Command\Nick($this->config->getNick()));

        $this->loop();

        // Register with the NickServ if the password is set
        if ($this->config->shouldUsePassword()) {
            $this->sendData(new Command\Privmsg('NickServ', 'REGISTER ' . $this->config->getPass() . ' ' . $this->config->getPluginSetting('emailAddress')));
        }
    }

    /**
     * Executes a command based on the given data
     *
     * @param string $data
     */
    public function executeCommand($data)
    {
        $ex = explode(' ', $data);

        if ($ex[0] == Ping::RAWNAME) {
            $this->sendData(new Pong($ex[1], ''));
            return;
        }

        if (count($ex) < 4) {
            return;
        }

        $command = str_replace(array(chr(10), chr(13)), '', $ex[3]);
        $cleanCommand = strtolower(ltrim($command, ':!'));

        $this->fireTrigger($cleanCommand, [
            'command' => new IncommingCommand($data)
        ]);
    }

    /**
     * The loop which checks for input
     */
    public function loop()
    {
        $data = $this->connection->getData();

        if ($data !== null) {
            $this->fireTrigger(self::TRIGGER_RECEIVE, ['command' => $data]);
            $this->executeCommand($data);
        }
    }

    /**
     * Sends data to the connection.
     *
     * @param Command Command
     */
    public function sendData(Command $cmd)
    {
        $this->connection->sendData($cmd);
        $this->fireTrigger(self::TRIGGER_SEND, ['command' => $cmd]);
    }

    /**
     * Fire a trigger
     *
     * @param string $triggerName
     */
    public function fireTrigger($triggerName, $data = [])
    {
        foreach ($this->config->getPlugins() as $plugin) {
            $commands = $plugin->fireTrigger($triggerName, $data);
            if (is_array($commands)) {
                foreach ($commands as $command) {
                    $this->sendData($command);
                }
            }

            $this->loop();
        }
    }
}