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
 * @method string getForce()
 * @method void setForce(boolean $flag)
 * @method string getNewBranch()
 * @method void setNewBranch(boolean $flag)
 * @method string getSsh()
 * @method void setSsh(string $command)
 * @method string getRemotecmd()
 * @method void setRemotecmd(string $command)
 * @method boolean getInsecure()
 * @method void setInsecure(boolean $flag)
 */
class PushCommand extends AbstractCommand
{
    /** @var array $arguments */
    protected $arguments = array(
        'destination' => ''
    );

    /** @var mixed $options */
    protected $options = array(
        '--force'      => false,
        '--new-branch' => false,
        '--ssh'        => '',
        '--remotecmd'  => '',
        '--insecure'   => false
    );

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->arguments['destination'];
    }

    /**
     * @param string $destination
     *
     * @return void
     */
    public function setDestination($destination)
    {
        $this->arguments['destination'] = escapeshellarg($destination);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            "%s%s %s",
            $this->name,
            $this->assembleOptionString(),
            $this->arguments['destination']
        );
    }
}
