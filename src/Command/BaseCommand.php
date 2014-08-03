<?php

namespace Siad007\VersionControl\HG\Command;

/**
 * Simple OO implementation for Mercurial.
 *
 * @author Siad Ardroumli <siad.ardroumli@gmail.com>
 */
class BaseCommand extends AbstractCommand
{
    /** @var array $arguments */
    protected $arguments = array();

    /** @var mixed $options */
    protected $options = array();

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
