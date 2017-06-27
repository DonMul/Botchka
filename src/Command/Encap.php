<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Encap
 * @author Joost Mul <joost@kiwble.net>
 *
 * This command is for use by servers to encapsulate commands so that they will propagate across hub servers not yet
 * updated to support them, and indicates the subcommand and its parameters should be passed unaltered to the
 * destination, where it will be unencapsulated and parsed. This facilitates implementation of new features without a
 * need to restart all servers before they are usable across the network.
 */
final class Encap extends Command
{
    /**
     * @var string
     */
    protected $source = '';

    /**
     * @var string
     */
    protected $destination = '';

    /**
     * @var string
     */
    protected $subCommand = '';

    /**
     * @var string
     */
    protected $parameters = '';

    /**
     * @param $destination
     * @param $parameters
     * @param $source
     * @param $subCommand
     */
    public function __construct($source, $destination, $subCommand, $parameters)
    {
        $this->setSource($source);
        $this->setDestination($destination);
        $this->setSubCommand($subCommand);
        $this->setParameters($parameters);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return ":<source> ENCAP <destination> <subcommand> <parameters>";
    }

    /**
     * @param string $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param string $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $subCommand
     */
    public function setSubCommand($subCommand)
    {
        $this->setSubCommand = $subCommand;
    }

    /**
     * @return string
     */
    public function getSubCommand()
    {
        return $this->subCommand;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return ":{$this->getSource()} ENCAP {$this->getDestination()} {$this->getSubCommand()} {$this->getParameters()}";
    }
} 
