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
 * @method boolean getModified()
 * @method void setNoModified(boolean $flag)
 * @method boolean getAdded()
 * @method void setAdded(boolean $flag)
 * @method boolean getRemoved()
 * @method void setRemoved(boolean $flag)
 * @method boolean getDeleted()
 * @method void setDeleted(boolean $flag)
 * @method boolean getClean()
 * @method void setClean(boolean $flag)
 * @method boolean getUnknown()
 * @method void setUnknown(boolean $flag)
 * @method boolean getIgnored()
 * @method void setIgnored(boolean $flag)
 * @method boolean getNoStatus()
 * @method void setNoStatus(boolean $flag)
 * @method boolean getCopies()
 * @method void setCopies(boolean $flag)
 * @method boolean getPrint0()
 * @method void setPrint0(boolean $flag)
 * @method array getRev()
 * @method void addRev(string $revision)
 * @method string getChange()
 * @method void setChange(string $revision)
 * @method array getInclude()
 * @method void addInclude(string $pattern)
 * @method array getExclude()
 * @method void addExclude(string $pattern)
 * @method boolean getSubrepos()
 * @method void setSubrepos(boolean $flag)
 */
class StatusCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = array(
        'file' => array()
    );

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = array(
        '--all'       => false,
        '--modified'  => false,
        '--added'     => false,
        '--removed'   => false,
        '--deleted'   => false,
        '--clean'     => false,
        '--unknown'   => false,
        '--ignored'   => false,
        '--no-status' => false,
        '--copies'    => false,
        '--print0'    => false,
        '--rev'       => array(),
        '--change'    => '',
        '--include'   => array(),
        '--exclude'   => array(),
        '--subrepos'  => false,
    );

    /**
     * Get file arguments.
     *
     * @return array
     */
    public function getFile()
    {
        return $this->arguments['file'];
    }

    /**
     * Add file to arguments.
     *
     * @param string $file
     *
     * @return void
     */
    public function addFile($file)
    {
        $this->arguments['file'][] = escapeshellarg($file);
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
            implode(' ', $this->arguments['file'])
        );
    }
}
