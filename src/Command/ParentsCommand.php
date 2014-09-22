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
 * Simple OO implementation for Mercurial.
 *
 * @author Siad Ardroumli <siad.ardroumli@gmail.com>
 *
 * @method string getRev()
 * @method void setRev(string $revision)
 * @method string getTemplate()
 * @method void setTemplate(string $template)
 */
class ParentsCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [
        'file' => ''
    ];

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = [
        '--rev'      => '',
        '--template' => ''
    ];

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->arguments['file'];
    }

    /**
     * @param string $file
     *
     * @return void
     */
    public function setFile($file)
    {
        $this->arguments['file'] = escapeshellarg($file);
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf(
            "%s%s %s",
            $this->name,
            $this->assembleOptionString(),
            $this->arguments['file']
        );
    }
}
