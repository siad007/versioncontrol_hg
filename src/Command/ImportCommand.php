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
 * @method string getStrip()
 * @method void setStrip(string $num)
 * @method boolean getEdit()
 * @method void setEdit(boolean $flag)
 * @method boolean getNoCommit()
 * @method void setNoCommit(boolean $flag)
 * @method boolean getBypass()
 * @method void setBypass(boolean $flag)
 * @method boolean getExact()
 * @method void setExact(boolean $flag)
 * @method boolean getImportBranch()
 * @method void setImportBranch(boolean $flag)
 * @method string getMessage()
 * @method void setMessage(string $text)
 * @method string getLogfile()
 * @method void setLogfile(string $file)
 * @method string getDate()
 * @method void setDate(string $date)
 * @method string getUser()
 * @method void setUser(string $user)
 * @method string getSimilarity()
 * @method void setSimilarity(string $similarity)
 */
class ImportCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = array(
        'patch' => array()
    );

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = array(
        '--strip'         => '',
        '--edit'          => false,
        '--no-commit'     => false,
        '--bypass'        => false,
        '--exact'         => false,
        '--import-branch' => false,
        '--message'       => '',
        '--logfile'       => '',
        '--date'          => '',
        '--user'          => '',
        '--similarity'    => ''
    );

    /**
     * @return array
     */
    public function getPatch()
    {
        return $this->arguments['patch'];
    }

    /**
     * @param string $patch
     *
     * @return void
     */
    public function addPatch($patch)
    {
        $this->arguments['patch'][] = escapeshellarg($patch);
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
            implode(' ', $this->arguments['patch'])
        );
    }
}
