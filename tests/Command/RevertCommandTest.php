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

class RevertCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function revertCommand()
    {
        $revertCmd = Factory::createRevert();
        $revertCmd->addName('name1');
        $revertCmd->addName('name2');
        $revertCmd->setRev('revision');
        $revertCmd->setDate('date');
        $revertCmd->setAll(true);
        $revertCmd->setNoBackup(true);
        $revertCmd->addInclude('includePattern');
        $revertCmd->addExclude('excludePattern');
        $revertCmd->setDryRun(true);

        $name = '\'name1\' \'name2\'';
        $expected = 'hg revert --all --date ' . escapeshellarg('date') . ' --rev ' . escapeshellarg('revision') . ' --no-backup --include includePattern --exclude excludePattern --dry-run ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $name = str_replace("'", '"', $name);
        }

        $this->assertSame($name, implode(' ', $revertCmd->getName()));
        $this->assertSame($expected . $name, $revertCmd->asString());
    }
}
