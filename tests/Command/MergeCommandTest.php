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

class MergeCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function mergeCommand()
    {
        $mergeCmd = Factory::createMerge();
        $mergeCmd->setRev('revision');
        $mergeCmd->setTool('testtool');
        $mergeCmd->setPreview(true);

        $expected = 'hg merge --rev ' . escapeshellarg('revision') . ' --preview --tool ' . escapeshellarg('testtool');

        $this->assertSame($expected, $mergeCmd->asString());
    }
}
