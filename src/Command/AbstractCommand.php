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
 * Abstract class for VersionControl_HG.
 *
 * This class maintains all global options and take care about getters and
 * setters.
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
 * @method string getEncoding()
 * @method void setEncoding(string $encoding)
 * @method string getEncodingmode()
 * @method void setEncodingmode(string $mode)
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

    /** @var array $options */
    protected $options = array();

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
    public function run($return = false)
    {
        if ($return) {
            return sprintf($this->command, $this);
        } else {
            $output = array();
            $code = 0;

            exec(sprintf($this->command, $this) . " 2>&1", $output, $code);

            if ($code != 0) {
                throw new \RuntimeException(
                    'An error occurred while using Mercurial; hg returned: '
                    . implode(PHP_EOL, $output)
                );
            } else {
                echo implode(PHP_EOL, $output);
            }
        }
    }

    /**
     * Magic method to get option entries with a getter/setter method.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return boolean|string
     *
     * @throws \InvalidArgumentException
     */
    public function __call($name, $arguments)
    {
        if (preg_match('~^(set|get|add)([A-Z])(.*)$~', $name, $matches)) {
            $property = strtolower($matches[2]) . $matches[3];

            if (! isset($this->options["--{$property}"])) {
                throw new \InvalidArgumentException('Property ' . $property . ' not exists');
            }
            switch ($matches[1]) {
                case 'set':
                    return $this->options["--{$property}"] = $arguments[0];
                case 'get':
                    return $this->options["--{$property}"];
                case 'add':
                    return $this->options["--{$property}"][] = $arguments[0];
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
            } elseif (is_array($option) && !empty($option)) {
                $optionString .= " {$name} " . implode(' ', $option);
            }
        }

        return $optionString !== '' ? $optionString . '' : ' ';
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
