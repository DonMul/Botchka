<?php

namespace Botchka\Command;
use \Botchka\Command;

/**
 * Class Topic
 * @author Joost Mul <joost@jmul.net>
 *
 * Allows the client to query or set the channel topic on <channel>. If <topic> is given, it sets the channel topic to
 * <topic>. If channel mode +t is set, only a channel operator may set the topic.
 *
 * Defined in RFC 1459
 */
final class Topic extends Command
{
    /**
     * @var string
     */
    protected $channel = '';

    /**
     * @var string
     */
    protected $topic = '';

    /**
     * @param $channel
     * @param $topic
     */
    public function __construct($channel, $topic)
    {
        $this->setChannel($channel);
        $this->setTopic($topic);
    }

    /**
     * @return string
     */
    public function getSyntax()
    {
        return "TIME [<server>]";
    }

    /**
     * @param string $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param string $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @return string
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "TOPIC {$this->getChannel()} {$this->getTopic()}";
    }
} 
