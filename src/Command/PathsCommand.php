<?php

namespace Siad007\VersionControl\HG\Command;

use Siad007\VersionControl\HG\Command;

/**
 * Simple OO implementation for Mercurial.
 *
 * @author Siad Ardroumli <siad.ardroumli@gmail.com>
 *
 * @method string getSsh()
 * @method void setSsh(string $command)
 * @method string getRemotecmd()
 * @method void setRemotecmd(string $command)
 * @method boolean getInsecure()
 * @method void setInsecure(boolean $flag)
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
     * @param string $destination
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
        $argument = $this->arguments['name'] === '' ?: ' ' . $this->arguments['name'];

        return sprintf("%s%s", $this->name, $argument);
    }
}
