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
 * @method boolean getNum()
 * @method void setNum(boolean $flag)
 * @method boolean getId()
 * @method void setId(boolean $flag)
 * @method boolean getBranch()
 * @method void setBranch(boolean $flag)
 * @method boolean getTags()
 * @method void setTags(boolean $flag)
 * @method boolean getBookmarks()
 * @method void setBookmarks(boolean $flag)
 * @method string getSsh()
 * @method void setSsh(string $command)
 * @method string getRemotecmd()
 * @method void setRemotecmd(string $command)
 * @method boolean getInsecure()
 * @method void setInsecure(boolean $flag)
 */
class IdentifyCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [
        'source'      => ''
    ];

    /**
     * {@inheritdoc}
     *
     * @var array $options
     */
    protected $options = [
        '--rev'       => '',
        '--num'       => false,
        '--id'        => false,
        '--branch'    => false,
        '--tags'      => false,
        '--bookmarks' => false,
        '--ssh'       => '',
        '--remotecmd' => '',
        '--insecure'  => false
    ];

    /**
     * Get the source argument for this command.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->arguments['source'];
    }

    /**
     * Set the source argument for this command.
     *
     * @param string $source
     *
     * @return void
     */
    public function setSource($source)
    {
        $this->arguments['source'] = escapeshellarg($source);
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
            $this->arguments['source']
        );
    }
}
