<?php

namespace Botchka;

/**
 * Class IncommingCommand
 * @package Botchka
 * @author Joost Mul <joost@jmul.net>
 */
final class IncommingCommand
{
    /**
     * The raw command that came in
     *
     * @var string
     */
    private $rawCommand;

    /**
     * The user who said the command
     *
     * @var string
     */
    private $user;

    /**
     * The channel the command is said in
     *
     * @var string
     */
    private $channel;

    /**
     * The extra text that is said
     *
     * @var string
     */
    protected $text;

    /**
     * IncommingCommand constructor.
     *
     * @param string $raw
     */
    public function __construct($raw)
    {
        $this->setRawCommand($raw);

        $explodedCommand = explode(' ', $raw);
        $exploded = explode('!', trim($explodedCommand[0]));
        $user = ltrim($exploded[0], ':');

        $this->setUser($user);
        $this->setChannel($explodedCommand[2]);
        $strings = [];
        for ($i = 4; $i < count($explodedCommand); $i++) {
            $strings[] = $explodedCommand[$i];
        }

        $this->setText(trim(implode(' ', $strings)));
    }

    /**
     * Sets the channel this command was said in
     *
     * @param string $channel
     */
    private function setChannel($channel)
    {
        $this->channel = trim($channel);
    }

    /**
     * Returns the channel this command was said in
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Sets the raw command given
     *
     * @param string $rawCommand
     */
    private function setRawCommand($rawCommand)
    {
        $this->rawCommand = $rawCommand;
    }

    /**
     * Returns the raw command
     *
     * @return string
     */
    public function getRawCommand()
    {
        return $this->rawCommand;
    }

    /**
     * Set the additional text that was said
     *
     * @param string $text
     */
    private function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Returns the additional text that was said
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets the user that said this command
     *
     * @param string $user
     */
    private function setUser($user)
    {
        $this->user = trim($user);
    }

    /**
     * Returns the user that said this command
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Returns whether or not this command was said in a channel. If it is not, it is said via a private message
     *
     * @return bool
     */
    public function isSaidInChannel()
    {
        return strpos($this->getChannel(), '#') === 0;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->rawCommand;
    }
} 
