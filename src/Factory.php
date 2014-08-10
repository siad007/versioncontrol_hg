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
use Siad007\VersionControl\HG\Command\AddCommand;
use Siad007\VersionControl\HG\Command\CloneCommand;
use Siad007\VersionControl\HG\Command\HeadsCommand;
use Siad007\VersionControl\HG\Command\InitCommand;
use Siad007\VersionControl\HG\Command\PathsCommand;
use Siad007\VersionControl\HG\Command\PullCommand;
use Siad007\VersionControl\HG\Command\PushCommand;
use Siad007\VersionControl\HG\Command\RootCommand;
use Siad007\VersionControl\HG\Command\SummaryCommand;
use Siad007\VersionControl\HG\Command\TagsCommand;
use Siad007\VersionControl\HG\Command\UpdateCommand;
use Siad007\VersionControl\HG\Command\VerifyCommand;
use Siad007\VersionControl\HG\Command\VersionCommand;

/**
 * Factory class.
 *
 * @method static AddCommand createAdd(array $options = array())
 * @method static AddremoveCommand createAddremove(array $options = array())
 * @method static CloneCommand createClone(array $options = array())
 * @method static HeadsCommand createHeads(array $options = array())
 * @method static InitCommand createInit(array $options = array())
 * @method static PathsCommand createPaths(array $options = array())
 * @method static PullCommand createPull(array $options = array())
 * @method static PushCommand createPush(array $options = array())
 * @method static RootCommand createRoot(array $options = array())
 * @method static SummaryCommand createSummary(array $options = array())
 * @method static TagsCommand createTags(array $options = array())
 * @method static UpdateCommand createUpdate(array $options = array())
 * @method static VerifyCommand createVerify(array $options = array())
 * @method static VersionCommand createVersion(array $options = array())
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
     * Magic method to reduce the number of methods.
     *
     * @param string $name
     * @param array $arguments
     *
     * @return AbstractCommand
     *
     * @throws \InvalidArgumentException
     */
    public static function __callStatic($name, $arguments)
    {
        if (strpos($name, 'create') !== 0) {
            throw new \InvalidArgumentException(
                "Create command $name not supported."
            );
        } else {
            $command = strtolower(str_replace('create', '', $name));
        }

        $options = isset($arguments[0]) && is_array($arguments[0]) ? $arguments[0] : array();

        return self::getInstance($command, $options);
    }

    /**
     * Disabled clone behavior.
     */
    final private function __clone()
    {
    }
}
