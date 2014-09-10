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

class RecoverCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function recoverCommand()
    {
        $recoverCmd = Factory::createRecover();

        $expected = 'hg recover';

        $this->assertSame($expected, $recoverCmd->asString());
    }
}
