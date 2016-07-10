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
 * @method boolean getClean()
 * @method void setClean(boolean $flag)
 * @method boolean getCheck()
 * @method void setCheck(boolean $flag)
 * @method string getDate()
 * @method void setDate(string $date)
 * @method string getRev()
 * @method void setRev(string $rev)
 */
class UpdateCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [
        'branch' => ''
    ];

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = [
        '--clean' => false,
        '--check' => false,
        '--date'  => '',
        '--rev'   => ''
    ];

    public function getBranch()
    {
        return $this->arguments['branch'];
    }

    /**
     * @param string $branch
     *
     * @return void
     */
    public function setBranch($branch)
    {
        $this->arguments['branch'] = escapeshellarg($branch);
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
            $this->arguments['branch']
        );
    }
}
