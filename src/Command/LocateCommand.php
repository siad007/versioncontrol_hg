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
 * @method string getRev()
 * @method void setRev(string $revision)
 * @method boolean getPrint0()
 * @method void setPrint0(boolean $flag)
 * @method boolean getFullpath()
 * @method void setFullpath(boolean $flag)
 * @method array getInclude()
 * @method void addInclude(string $pattern)
 * @method array getExclude()
 * @method void addExclude(string $pattern)
 */
class LocateCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [
        'pattern' => []
    ];

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = [
        '--rev'       => '',
        '--print0'    => false,
        '--fullpath'  => false,
        '--include'   => [],
        '--exclude'   => []
    ];

    /**
     * Get pattern arguments.
     *
     * @return array
     */
    public function getPattern()
    {
        return $this->arguments['pattern'];
    }

    /**
     * Add pattern to arguments.
     *
     * @param string $pattern
     *
     * @return void
     */
    public function addPattern($pattern)
    {
        $this->arguments['pattern'][] = escapeshellarg($pattern);
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
            implode(' ', $this->arguments['pattern'])
        );
    }
}
