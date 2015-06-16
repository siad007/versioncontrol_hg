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

class UpdateCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function updateCommand()
    {
        $updateCmd = Factory::createUpdate();
        $updateCmd->setClean(true);
        $updateCmd->setCheck(true);
        $updateCmd->setDate('date');
        $updateCmd->setRev('rev');

        $expected = 'hg update --clean --check --date ' . escapeshellarg('date') . ' --rev ' . escapeshellarg('rev');

        $this->assertSame($expected, $updateCmd->asString());
    }
}
