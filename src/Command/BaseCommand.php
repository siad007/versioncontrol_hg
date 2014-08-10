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
 * Base command.
 */
class BaseCommand extends AbstractCommand
{
    /** @var array $arguments */
    protected $arguments = array();

    /** @var mixed $options */
    protected $options = array();

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->name;
    }
}
