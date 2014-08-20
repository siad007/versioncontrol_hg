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

class CloneCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function cloneCommand()
    {
        $cloneCmd = Factory::createClone();
        $cloneCmd->setSource('C:\\xampp\\source');
        $cloneCmd->setDestination('C:\\xampp\\dest');
        $cloneCmd->setUncompressed(true);
        $cloneCmd->setInsecure(true);

        $expected = 'hg clone --uncompressed --insecure \'C:\xampp\source\' \'C:\xampp\dest\'';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $expected = str_replace("'", '"', $expected);
        }

        $this->assertSame($expected, $cloneCmd->run(true));
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

        $this->assertSame($expected, $cloneCmd->run(true));
    }

    /**
     * @test
     */
    public function cloneCommandWithoutSource()
    {
        $this->markTestSkipped('this is a misbehavior and should be fixed');
        /* @var $cloneCmd \Siad007\VersionControl\HG\Command\CloneCommand */
        $cloneCmd = Factory::getInstance('clone');
        $cloneCmd->setUncompressed(true);
        $cloneCmd->setInsecure(true);

        $this->assertSame('hg ', $cloneCmd->run(true), print_r($cloneCmd->run(true), true));
    }
}
