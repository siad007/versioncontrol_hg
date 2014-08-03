<?php

namespace Siad007\VersionControl\HG\Command;

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
class CloneCommand extends AbstractCommand
{
    /** @var array $arguments */
    protected $arguments = array(
        'destination' => '',
        'source'      => ''
    );

    /** @var mixed $options */
    protected $options = array(
        '--noupdate'     => '',
        '--pull'         => '',
        '--uncompressed' => false,
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
            throw new \InvalidArgumentException(
                'You have to set a source directory.'
            );
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
