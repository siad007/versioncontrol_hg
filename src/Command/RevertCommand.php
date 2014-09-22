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

namespace Siad007\VersionControl\HG\Command;

/**
 * Simple OO implementation for Mercurial.
 *
 * @author Siad Ardroumli <siad.ardroumli@gmail.com>
 *
 * @method boolean getAll()
 * @method void setAll(boolean $flag)
 * @method string getDate()
 * @method void setDate(string $date)
 * @method string getRev()
 * @method void setRev(string $revision)
 * @method boolean getNoBackup()
 * @method void setNoBackup(boolean $flag)
 * @method array getInclude()
 * @method void addInclude(string $pattern)
 * @method array getExclude()
 * @method void addExclude(string $pattern)
 * @method boolean getDryRun()
 * @method void setDryRun(boolean $flag)
 */
class RevertCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [
        'name' => []
    ];

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = [
        '--all'       => false,
        '--date'      => '',
        '--rev'       => '',
        '--no-backup' => false,
        '--include'   => [],
        '--exclude'   => [],
        '--dry-run'   => false
    ];

    /**
     * @return array
     */
    public function getName()
    {
        return $this->arguments['name'];
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function addName($name)
    {
        $this->arguments['name'][] = escapeshellarg($name);
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf(
            "%s%s %s",
            $this->name,
            $this->assembleOptionString(),
            implode(' ', $this->arguments['name'])
        );
    }
}
