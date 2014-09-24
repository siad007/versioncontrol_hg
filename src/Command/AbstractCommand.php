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
 * @method boolean getCwd()
 * @method void setCwd(string $directory)
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
 * @method array getConfig()
 * @method void addConfig(string $config)
 */
abstract class AbstractCommand
{
    /** @var string $name */
    protected $name = '';

    /** @var string $command */
    protected $command = 'hg %s';

    /**
     * Command specific options.
     *
     * @var array $options
     */
    protected $options = [];

    /** @var array $globalOptions */
    protected $globalOptions = [
        '--repository'     => '',
        '--cwd'            => '',
        '--noninteractive' => false,
        '--quiet'          => false,
        '--verbose'        => false,
        '--config'         => [],
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
    ];

    /**
     * Returns a string representation for the mercurial shell command.
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf($this->command, $this);
    }

    /**
     * Standard constructor.
     *
     * - sets the concrete commands name
     * - merges the global options with the concrete commands options
     *
     * @param mixed $options
     */
    public function __construct($options = [])
    {
        $this->name = $this->getCommandName();

        $this->options = array_merge($this->options, $options);
    }

    /**
     * Execute mercurial command.
     *
     * @return string
     */
    public function execute()
    {
        $output = [];
        $code = 0;

        exec(sprintf($this->command, $this) . " 2>&1", $output, $code);

        if ($code != 0) {
            throw new \RuntimeException(
                'An error occurred while using VersionControl_HG; hg returned: '
                . implode(PHP_EOL, $output),
                $code
            );
        }

        return implode(PHP_EOL, $output);
    }

    /**
     * Returns the string representation of the command.
     *
     * @return string
     */
    public function asString()
    {
        return self::__toString();
    }

    /**
     * Magic method to get option entries with a getter/setter method.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return boolean|array|string
     *
     * @throws \InvalidArgumentException
     */
    public function __call($name, $arguments)
    {
        if (preg_match('~^(set|get|add)([A-Z])([a-z]*)([A-Z]?)(.*)$~', $name, $matches)) {
            $match = !empty($matches[4]) ? sprintf('-%s%s', strtolower($matches[4]), $matches[5]) : '';
            $property = strtolower($matches[2]) . $matches[3] . $match;

            $this->options = array_merge($this->globalOptions, $this->options);

            $this->doesPropertyExist($property);

            $result = false;

            switch ($matches[1]) {
                case 'set':
                    $this->options["--{$property}"] = $arguments[0];
                    $result = $arguments[0];
                    break;
                case 'get':
                    $result = $this->options["--{$property}"];
                    break;
                case 'add':
                    $this->options["--{$property}"][] = $arguments[0];
                    $result = $arguments[0];
                    break;
            }

            return $result;
        }

        throw new \InvalidArgumentException('Method ' . $name . ' not exists');
    }

    /**
     * Does property exist check.
     *
     * @param string $property
     *
     * @throws \InvalidArgumentException
     */
    private function doesPropertyExist($property)
    {
        if (! isset($this->options["--{$property}"])) {
            throw new \InvalidArgumentException('Property ' . $property . ' not exists');
        }
    }

    /**
     * Concatinates string options.
     *
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
