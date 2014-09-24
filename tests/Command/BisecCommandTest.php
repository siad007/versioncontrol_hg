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

class BisecCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function bisecCommand()
    {
        $bisecCmd = Factory::createBisec();
        $bisecCmd->setReset(true);
        $bisecCmd->setGood(true);
        $bisecCmd->setBad(true);
        $bisecCmd->setSkip(true);
        $bisecCmd->setExtend(true);

        $expected = 'hg bisec --reset --good --bad --skip --extend';

        $this->assertSame($expected, $bisecCmd->asString());
    }
}
