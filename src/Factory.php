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

/**
 * Factory class.
 *
 * @method static Command\AddCommand createAdd(array $options = array())
 * @method static Command\AddremoveCommand createAddremove(array $options = array())
 * @method static Command\AnnotateCommand createAnnotate(array $options = array())
 * @method static Command\ArchiveCommand createArchive(array $options = array())
 * @method static Command\BackoutCommand createBackout(array $options = array())
 * @method static Command\BlameCommand createBlame(array $options = array())
 * @method static Command\BookmarksCommand createBookmarks(array $options = array())
 * @method static Command\BranchCommand createBranch(array $options = array())
 * @method static Command\BranchesCommand createBranches(array $options = array())
 * @method static Command\BundleCommand createBundle(array $options = array())
 * @method static Command\CatCommand createCat(array $options = array())
 * @method static Command\CloneCommand createClone(array $options = array())
 * @method static Command\CommitCommand createCommit(array $options = array())
 * @method static Command\CopyCommand createCopy(array $options = array())
 * @method static Command\ForgetCommand createForget(array $options = array())
 * @method static Command\HeadsCommand createHeads(array $options = array())
 * @method static Command\IdentifyCommand createIdentify(array $options = array())
 * @method static Command\ImportCommand createImport(array $options = array())
 * @method static Command\InitCommand createInit(array $options = array())
 * @method static Command\LocateCommand createLocate(array $options = array())
 * @method static Command\ManifestCommand createManifest(array $options = array())
 * @method static Command\MergeCommand createMerge(array $options = array())
 * @method static Command\PathsCommand createPaths(array $options = array())
 * @method static Command\ParentsCommand createParents(array $options = array())
 * @method static Command\PullCommand createPull(array $options = array())
 * @method static Command\PushCommand createPush(array $options = array())
 * @method static Command\RecoverCommand createRecover(array $options = array())
 * @method static Command\RemoveCommand createRemove(array $options = array())
 * @method static Command\RenameCommand createRename(array $options = array())
 * @method static Command\ResolveCommand createResolve(array $options = array())
 * @method static Command\RevertCommand createRevert(array $options = array())
 * @method static Command\RootCommand createRoot(array $options = array())
 * @method static Command\StatusCommand createStatus(array $options = array())
 * @method static Command\SummaryCommand createSummary(array $options = array())
 * @method static Command\TagCommand createTag(array $options = array())
 * @method static Command\TagsCommand createTags(array $options = array())
 * @method static Command\UnbundleCommand createUnbundle(array $options = array())
 * @method static Command\UpdateCommand createUpdate(array $options = array())
 * @method static Command\VerifyCommand createVerify(array $options = array())
 * @method static Command\VersionCommand createVersion(array $options = array())
 */
class Factory
{
    /**
     * Disabled constructor.
     *
     * @codeCoverageIgnore
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
     * @return Command\AbstractCommand
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
     * @param array  $arguments
     *
     * @return Command\AbstractCommand
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
     *
     * @codeCoverageIgnore
     */
    final private function __clone()
    {
    }
}
