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
 * @method boolean getAddremove()
 * @method void setAddremove(boolean $flag)
 * @method boolean getCloseBranch()
 * @method void setCloseBranch(boolean $flag)
 * @method boolean getAmend()
 * @method void setAmend(boolean $flag)
 * @method boolean getSecret()
 * @method void setSecret(boolean $flag)
 * @method boolean getEdit()
 * @method void setEdit(boolean $flag)
 * @method array getInclude()
 * @method void addInclude(string $pattern)
 * @method array getExclude()
 * @method void addExclude(string $pattern)
 * @method string getMessage()
 * @method void setMessage(string $text)
 * @method string getLogfile()
 * @method void setLogfile(string $file)
 * @method string getDate()
 * @method void setDate(string $date)
 * @method string getUser()
 * @method void setUser(string $user)
 * @method boolean getSubrepos()
 * @method void setSubrepos(boolean $flag)
 */
class CommitCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [
        'file' => []
    ];

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = [
        '--addremove'    => false,
        '--close-branch' => false,
        '--amend'        => false,
        '--secret'       => false,
        '--edit'         => false,
        '--include'      => [],
        '--exclude'      => [],
        '--message'      => '',
        '--logfile'      => '',
        '--date'         => '',
        '--user'         => '',
        '--subrepos'     => false
    ];

    /**
     * @return array
     */
    public function getFile()
    {
        return $this->arguments['file'];
    }

    /**
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
