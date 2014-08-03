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

        return new $commandClassName;

        throw new \InvalidArgumentException(
            "Command $commandClassName not supported."
        );
    }

    /**
     * Disabled clone behavior.
     */
    final private function __clone()
    {
    }
}
