<?php
namespace Siad007\VersionControl\HG\Command;

/**
 *
 * @author Siad Ardroumli <siad.ardroumli@gmail.com>
 *
 * @method boolean getVerbose()
 * @method void setVerbose(boolean $flag)
 * @method boolean getQuiet()
 * @method void setQuiet(boolean $flag)
 * @method boolean getNoninteractive()
 * @method void setNoninteractive(boolean $flag)
 * @method boolean getVerbose()
 * @method void setVerbose(boolean $flag)
 * @method boolean getDebug()
 * @method void setDebug(boolean $flag)
 * @method boolean getDebugger()
 * @method void setDebugger(boolean $flag)
 * @method boolean getTraceback()
 * @method void setTraceback(boolean $flag)
 * @method boolean getTime()
 * @method void setTime(boolean $flag)
 * @method boolean getProfile()
 * @method void setProfile(boolean $flag)
 * @method boolean getVersion()
 * @method void setVersion(boolean $flag)
 * @method boolean getHelp()
 * @method void setHelp(boolean $flag)
 * @method boolean getHidden()
 * @method void setHidden(boolean $flag)
 */
abstract class AbstractCommand
{
    /** @var string $name */
    protected $name = '';

    /**  @var string $command */
    protected $command = 'hg %s';

    /** @var array $globalOptions */
    protected $globalOptions = array(
        '--repository'     => '',
        '--cwd'            => '',
        '--noninteractive' => false,
        '--quiet'          => false,
        '--verbose'        => false,
        '--debug'          => false,
        '--debugger'       => false,
        '--encoding'       => '',
        '--encodingmode'   => '',
        '--traceback'      => false,
        '--time'           => false,
        '--profile'        => false,
        '--version'        => false,
        '--help'           => false,
        '--hidden'         => false,
    );

    /**
     * Returns a string representation for the mercurial shell command.
     */
    abstract public function __toString();

    /**
     * Standard constructor.
     * - sets the concrete commands name
     * - merges the global options with the concrete commands options
     */
    public function __construct($options = array())
    {
        $this->name = $this->getCommandName();

        $this->options = array_merge($this->globalOptions, $this->options, $options);
    }

    /**
     * Main run function.
     */
    public function run()
    {
        printf($this->command, $this);
        /*
         * exec(
         * sprintf($this->command, $this),
         * $output,
         * $returnValue
         * );
         */
    }

    /**
     * Magic method to get option entries with a getter/setter method.
     *
     * @param string $name
     * @param array $arguments
     *
     * @return boolean|string
     *
     * @throws \InvalidArgumentException
     */
    public function __call($name, $arguments)
    {
        if (preg_match('~^(set|get)([A-Z])(.*)$~', $name, $matches)) {
            $property = strtolower($matches[2]) . $matches[3];

            if (! isset($this->options["--{$property}"])) {
                throw new \InvalidArgumentException('Property ' . $property . ' not exists');
            }
            switch ($matches[1]) {
                case 'set':
                    return $this->options["--{$property}"] = $arguments[0];
                case 'get':
                    return $this->options["--{$property}"];
                case 'default':
                    throw new \InvalidArgumentException('Method ' . $name . ' not exists');
            }
        }
    }

    /**
     * @return string
     */
    protected function assembleOptionString()
    {
        $optionString = '';

        foreach ($this->options as $name => $option) {
            if ($option === true) {
                $optionString .= " {$name}";
            } elseif (is_string($option) && $option !== '') {
                $optionString .= " {$name} {$option}";
            }
        }

        return $optionString !== '' ? $optionString . ' ' : ' ';
    }

    /**
     * Returns the concrete commands name.
     *
     * @return string
     */
    private function getCommandName()
    {
        $className   = implode('', array_slice(explode('\\', get_class($this)), -1));
        $commandName = str_replace('command', '', strtolower($className));

        return $commandName;
    }
}
