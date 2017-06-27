<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Raw
 */
final class Raw extends Command
{
    /**
     * @var string
     */
    protected $rawCommand = '';

    /**
     * @param $rawCommand
     */
    public function __construct($rawCommand)
    {
        $this->setRawCommand($rawCommand);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "<raw command>";
    }

    /**
     * @param string $rawCommand
     */
    public function setRawCommand($rawCommand)
    {
        $this->rawCommand = $rawCommand;
    }

    /**
     * @return string
     */
    public function getRawCommand()
    {
        return $this->rawCommand;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "{$this->getRawCommand()}";
    }
} 
