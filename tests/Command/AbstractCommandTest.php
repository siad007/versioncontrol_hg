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

use Siad007\VersionControl\HG\Command\AbstractCommand;

class AbstractCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @expectedException \InvalidArgumentException
     */
    public function propertyDoesNotExist()
    {
        $abstractCommand = $this->getMockForAbstractClass('\\Siad007\\VersionControl\\HG\Command\\AbstractCommand');

        $abstractCommand->getTest();
    }

    /**
     * @test
     */
    public function propertyExist()
    {
        $abstractCommand = $this->getMockForAbstractClass('\\Siad007\\VersionControl\\HG\Command\\AbstractCommand');

        $this->assertFalse($abstractCommand->getVersion());
    }

    /**
     * @test
     *
     * @expectedException \InvalidArgumentException
     */
    public function wrongMethodPrefix()
    {
        $abstractCommand = $this->getMockForAbstractClass('\\Siad007\\VersionControl\\HG\Command\\AbstractCommand');

        $abstractCommand->testVersion();
    }
}
