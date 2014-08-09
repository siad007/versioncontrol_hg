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

use Siad007\VersionControl\HG\Command;

/**
 * Simple OO implementation for Mercurial.
 *
 * @author Siad Ardroumli <siad.ardroumli@gmail.com>
 *
 * @method string getName()
 * @method void setName(string $name)
 */
class PathsCommand extends AbstractCommand
{
    /** @var array $arguments */
    protected $arguments = array(
        'name' => ''
    );

    /** @var mixed $options */
    protected $options = array();

    /**
     * @return string
     */
    public function getName()
    {
        return $this->arguments['name'];
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName($name)
    {
        $this->arguments['name'] = $name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            "%s%s%s",
            $this->name,
            $this->assembleOptionString(),
            $this->arguments['name']
        );
    }
}
