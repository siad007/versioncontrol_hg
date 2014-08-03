<?php

namespace Siad007\VersionControl\HG\Command;

/**
 * Simple OO implementation for Mercurial.
 *
 * @author Siad Ardroumli <siad.ardroumli@gmail.com>
 *
 * @method boolean getNoupdate()
 * @method void setNoupdate(boolean $flag)
 * @method boolean getPull()
 * @method void setPull(boolean $flag)
 * @method boolean getUncompressed()
 * @method void setUncompressed(boolean $flag)
 * @method string getSsh()
 * @method void setSsh(string $command)
 * @method string getRemotecmd()
 * @method void setRemotecmd(string $command)
 * @method boolean getInsecure()
 * @method void setInsecure(boolean $flag)
 */
class CloneCommand extends AbstractCommand
{
    /** @var array $arguments */
    protected $arguments = array(
        'destination' => '',
        'source'      => ''
    );

    /** @var mixed $options */
    protected $options = array(
        '--noupdate'     => false,
        '--pull'         => false,
        '--uncompressed' => false,
        '--ssh'       => '',
        '--remotecmd' => '',
        '--insecure'     => false
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
    public function getSource()
    {
        return $this->arguments['source'];
    }

    /**
     * @param string $source
     *
     * @return void
     */
    public function setSource($source)
    {
        $this->arguments['source'] = escapeshellarg($source);
    }

    /**
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function __toString()
    {
        if ($this->arguments['source'] === '') {
            return '';
        }

        if ($this->arguments['destination'] === '') {
            $result = sprintf(
                "%s%s%s",
                $this->name,
                $this->assembleOptionString(),
                $this->arguments['source']
            );
        } else {
            $result = sprintf(
                "%s%s%s %s",
                $this->name,
                $this->assembleOptionString(),
                $this->arguments['source'],
                $this->arguments['destination']
            );
        }

        return $result;
    }
}
