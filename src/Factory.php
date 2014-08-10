<?php
/**
 * VersionControl_HG
 * Simple OO implementation for Mercurial.
 *
 * PHP Version 5.4
 *
 * @copyright 2014 Siad Ardroumli
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link http://siad007.github.io/versioncontrol_hg
 */

namespace Siad007\VersionControl\HG;

use Siad007\VersionControl\HG\Command\AbstractCommand;

/**
 * Factory class.
 */
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
     * Creates a `CloneCommand` instance.
     *
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\CloneCommand
     */
    public static function createClone($options = array())
    {
        return self::getInstance('clone', $options);
    }

    /**
     * Creates a `HeadsCommand` instance.
     *
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\HeadsCommand
     */
    public static function createHeads($options = array())
    {
        return self::getInstance('heads', $options);
    }

    /**
     * Creates a `InitCommand` instance.
     *
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\InitCommand
     */
    public static function createInit($options = array())
    {
        return self::getInstance('init', $options);
    }

    /**
     * Creates a `PathsCommand` instance.
     *
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\PathsCommand
     */
    public static function createPaths($options = array())
    {
        return self::getInstance('paths', $options);
    }

    /**
     * Creates a `PullCommand` instance.
     *
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\PullCommand
     */
    public static function createPull($options = array())
    {
        return self::getInstance('pull', $options);
    }

    /**
     * Creates a `PushCommand` instance.
     *
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\PushCommand
     */
    public static function createPush($options = array())
    {
        return self::getInstance('push', $options);
    }

    /**
     * Creates a `RootCommand` instance.
     *
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\RootCommand
     */
    public static function createRoot($options = array())
    {
        return self::getInstance('root', $options);
    }

    /**
     * Creates a `SummaryCommand` instance.
     *
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\SummaryCommand
     */
    public static function createSummary($options = array())
    {
        return self::getInstance('summary', $options);
    }

    /**
     * Creates a `TagsCommand` instance.
     *
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\TagsCommand
     */
    public static function createTags($options = array())
    {
        return self::getInstance('tags', $options);
    }

    /**
     * Creates a `UpdateCommand` instance.
     *
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\UpdateCommand
     */
    public static function createUpdate($options = array())
    {
        return self::getInstance('update', $options);
    }

    /**
     * Creates a `VerifyCommand` instance.
     *
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\VerifyCommand
     */
    public static function createVerify($options = array())
    {
        return self::getInstance('verify', $options);
    }

    /**
     * Creates a `VersionCommand` instance.
     *
     * @param array $options
     *
     * @return \Siad007\VersionControl\HG\Command\VersionCommand
     */
    public static function createVersion($options = array())
    {
        return self::getInstance('version', $options);
    }

    /**
     * Disabled clone behavior.
     */
    final private function __clone()
    {
    }
}
