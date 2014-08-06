<?php

namespace Siad007\VersionControl\HG;

use Siad007\VersionControl\HG\Command\AbstractCommand;

class Factory
{
    /**
     * Disabled constructor.
     */
    final private function __construct()
    {
    }

    /**
     * Factory method.
     *
     * @param string $command
     * @param array  $options
     *
     * @return AbstractCommand
     *
     * @throws \InvalidArgumentException
     */
    public static function getInstance($command, $options = array())
    {
        $commandClassName = sprintf(
            '\\Siad007\\VersionControl\\HG\\Command\\%sCommand',
            ucfirst($command)
        );

        if (!class_exists($commandClassName)) {
            throw new \InvalidArgumentException(
                "Command $commandClassName not supported."
            );
        }

        return new $commandClassName($options);
    }

    /**
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\CloneCommand
     */
    public static function createClone($options = array())
    {
        return self::getInstance('clone', $options);
    }

    /**
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\HeadsCommand
     */
    public static function createHeads($options = array())
    {
        return self::getInstance('heads', $options);
    }

    /**
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\InitCommand
     */
    public static function createInit($options = array())
    {
        return self::getInstance('init', $options);
    }

    /**
     * Disabled clone behavior.
     */
    final private function __clone()
    {
    }
}
