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
 * @method void setRev(string $output)
 * @method boolean getNoFollow()
 * @method void setNoFollow(boolean $flag)
 * @method boolean getText()
 * @method void setText(boolean $flag)
 * @method boolean getUser()
 * @method void setUser(boolean $flag)
 *  method boolean getFile() // TODO has to be fixed!
 * @method void setFile(boolean $flag)
 * @method boolean getDate()
 * @method void setDate(boolean $flag)
 * @method boolean getNumber()
 * @method void setNumber(boolean $flag)
 * @method boolean getChangeset()
 * @method void setChangeset(boolean $flag)
 * @method boolean getLineNumber()
 * @method void setLineNumber(boolean $flag)
 * @method boolean getIgnoreAllSpace()
 * @method void setIgnoreAllSpace(boolean $flag)
 * @method boolean getIgnoreSpaceChange()
 * @method void setIgnoreSpaceChange(boolean $flag)
 * @method boolean getIgnoreBlankLines()
 * @method void setIgnoreBlankLines(boolean $flag)
 * @method array getInclude()
 * @method void addInclude(string $pattern)
 * @method array getExclude()
 * @method void addExclude(string $pattern)
 */
class AnnotateCommand extends AbstractCommand
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
        '--rev'                 => '',
        '--no-follow'           => false,
        '--text'                => false,
        '--user'                => false,
        '--file'                => false,
        '--date'                => false,
        '--number'              => false,
        '--changeset'           => false,
        '--line-number'         => false,
        '--ignore-all-space'    => false,
        '--ignore-space-change' => false,
        '--ignore-blank-lines'  => false,
        '--include'             => [],
        '--exclude'             => [],
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
