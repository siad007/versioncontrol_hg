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

class PhaseCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function phaseCommand()
    {
        $phaseCmd = Factory::createPhase();
        $phaseCmd->setPublic(true);
        $phaseCmd->setForce(true);
        $phaseCmd->setVerbose(true);
        $phaseCmd->setEncoding('UTF-8');

        $expected = 'hg phase --verbose --encoding UTF-8 --public --force';

        $this->assertSame($expected, $phaseCmd->asString());
    }
}
