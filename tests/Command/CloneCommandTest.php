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
namespace Siad007\VersionControl\HG\Tests\Command;

use Siad007\VersionControl\HG\Factory;
use Siad007\VersionControl\HG\Tests\Helpers\TestCase;

class CloneCommandTest extends TestCase
{
    /**
     * @test
     */
    public function cloneCommand()
    {
        $cloneCmd = Factory::createClone();
        $cloneCmd->setSource('C:\\xampp\\source\\');
        $cloneCmd->setDestination('C:\\xampp\\dest\\');
        $cloneCmd->setUncompressed(true);
        $cloneCmd->setInsecure(true);

        $destination = '\'C:\xampp\dest\\\'';
        $source = '\'C:\xampp\source\\\'';
        $expected = "hg clone --uncompressed --insecure ";

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $destination = str_replace("'", '"', $destination);
            $source = str_replace("'", '"', $source);
        }

        $this->assertSame($destination, $cloneCmd->getDestination());
        $this->assertSame($source, $cloneCmd->getSource());
        $this->assertSame($expected . $source .  ' ' . $destination, $cloneCmd->asString());
    }

    /**
     * @test
     */
    public function cloneCommandWithoutDestination()
    {
        $cloneCmd = Factory::createClone();
        $cloneCmd->setSource('C:\\xampp\\source');
        $cloneCmd->setUncompressed(true);
        $cloneCmd->setInsecure(true);

        $expected = 'hg clone --uncompressed --insecure \'C:\xampp\source\'';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $expected = str_replace("'", '"', $expected);
        }

        $this->assertSame($expected, $cloneCmd->asString());
    }

    /**
     * @test
     */
    public function cloneCommandWithoutSource()
    {
        /* @var $cloneCmd \Siad007\VersionControl\HG\Command\CloneCommand */
        $cloneCmd = Factory::getInstance('clone');
        $cloneCmd->setUncompressed(true);
        $cloneCmd->setInsecure(true);
        $cloneCmd->asString();

        $this->assertError("No source directory given.", E_USER_ERROR);
    }
}
