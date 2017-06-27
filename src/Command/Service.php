<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Service
 * @author Joost Mul <joost@jmul.net>
 *
 * Registers a new service on the network.
 *
 * Defined in RFC 2812
 */
final class Service extends Command
{
    /**
     * @var string
     */
    protected $nickname = '';

    /**
     * @var string
     */
    protected $reserved = '';

    /**
     * @var string
     */
    protected $distribution = '';

    /**
     * @var string
     */
    protected $type = '';

    /**
     * @var string
     */
    protected $reserved2 = '';

    /**
     * @var string
     */
    protected $info = '';

    /**
     * @param $distribution
     * @param $info
     * @param $nickname
     * @param $reserved
     * @param $reserved2
     * @param $type
     */
    public function __construct($nickname, $reserved, $distribution, $type, $reserved2, $info)
    {
        $this->setNickname($nickname);
        $this->setReserved($reserved);
        $this->setDistribution($distribution);
        $this->setType($type);
        $this->setReserved2($reserved2);
        $this->setInfo($info);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "SERVICE <nickname> <reserverd> <distribution> <type> <reserved> <info>";
    }

    /**
     * @param string $distribution
     */
    public function setDistribution($distribution)
    {
        $this->distribution = $distribution;
    }

    /**
     * @return string
     */
    public function getDistribution()
    {
        return $this->distribution;
    }

    /**
     * @param string $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $reserved
     */
    public function setReserved($reserved)
    {
        $this->reserved = $reserved;
    }

    /**
     * @return string
     */
    public function getReserved()
    {
        return $this->reserved;
    }

    /**
     * @param string $reserved2
     */
    public function setReserved2($reserved2)
    {
        $this->reserved2 = $reserved2;
    }

    /**
     * @return string
     */
    public function getReserved2()
    {
        return $this->reserved2;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "SERVICE {$this->getNickName()} {$this->getReserved()} {$this->getDistribution()} {$this->getType()} {$this->getReserved2()} {$this->getInfo()}";
    }
} 
