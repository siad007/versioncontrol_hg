<?php

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
    /** @var array $arguments */
    protected $arguments = array();

    /** @var mixed $options */
    protected $options = array(
        '--clean' => false,
        '--check' => false,
        '--date'  => '',
        '--rev'   => ''
    );

    /**
     * @return string
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
