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
 * @method boolean getPreview()
 * @method void setPreview(boolean $flag)
 * @method string getTool()
 * @method void setTool(string $tool)
 */
class MergeCommand extends AbstractCommand
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
        '--rev'     => '',
        '--preview' => false,
        '--tool'    => ''
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
