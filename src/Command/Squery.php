<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Squery
 * @author Joost Mul <joost@jmul.net>
 *
 * Identical to PRIVMSG except the recipient must be a service.
 *
 * Defined in RFC 2812
 */
final class Squery extends Command
{
    /**
     * @var string
     */
    protected $serviceName = '';

    /**
     * @var string
     */
    protected $text = '';

    /**
     * @param $serviceName
     * @param $text
     */
    public function __construct($serviceName, $text)
    {
        $this->setServiceName($serviceName);
        $this->setText($text);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "SQUERY <servicename> <text>";
    }

    /**
     * @param string $serviceName
     */
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    /**
     * @return string
     */
    public function getServiceName()
    {
        return $this->serviceName;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "SQUERY {$this->getServiceName()} {$this->getText()}";
    }
} 
