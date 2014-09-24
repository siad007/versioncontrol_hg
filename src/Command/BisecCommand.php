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
 * @method boolean getReset()
 * @method void setReset(boolean $flag)
 * @method boolean getGood()
 * @method void setGood(boolean $flag)
 * @method boolean getBad()
 * @method void setBad(boolean $flag)
 * @method boolean getSkip()
 * @method void setSkip(boolean $flag)
 * @method boolean getExtend()
 * @method void setExtend(boolean $flag)
 * @method string getCommand()
 * @method void setCommand(string $command)
 * @method boolean getNoupdate()
 * @method void setNoupdate(boolean $flag)
 */
class BisecCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [];

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = [
        '--reset'    => false,
        '--good'     => false,
        '--bad'      => false,
        '--skip'     => false,
        '--extend'   => false,
        '--command'  => '',
        '--noupdate' => false
    ];

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf(
            "%s%s",
            $this->name,
            $this->assembleOptionString()
        );
    }
}
