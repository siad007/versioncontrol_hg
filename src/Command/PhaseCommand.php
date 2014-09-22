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
 * @method boolean getPublic()
 * @method void setPublic(boolean $flag)
 * @method string getDraft()
 * @method void setDraft(boolean $flag)
 * @method boolean getSecret()
 * @method void setSecret(boolean $flag)
 * @method boolean getForce()
 * @method void setForce(boolean $flag)
 * @method array getRev()
 * @method void addRev(string $revision)
 */
class PhaseCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = [
        '--public' => false,
        '--draft'  => false,
        '--secret' => false,
        '--force'  => false,
        '--rev'    => []
    ];

    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [];

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
