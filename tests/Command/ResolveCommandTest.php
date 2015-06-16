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

class ResolveCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function resolveCommand()
    {
        $resolveCmd = Factory::createResolve();
        $resolveCmd->addFile('C:\\xampp\\file1\\');
        $resolveCmd->addFile('C:\\xampp\\file2\\');
        $resolveCmd->setTool('testtool');
        $resolveCmd->addInclude('includePattern');
        $resolveCmd->addExclude('excludePattern');
        $resolveCmd->setAll(true);
        $resolveCmd->setList(true);
        $resolveCmd->setMark(true);
        $resolveCmd->setUnmark(true);
        $resolveCmd->setNoStatus(true);

        $file = '\'C:\xampp\file1\\\' \'C:\xampp\file2\\\'';
        $expected = 'hg resolve --all --list --mark --unmark --no-status --tool ' . escapeshellarg('testtool') . ' --include includePattern --exclude excludePattern ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $file = str_replace("'", '"', $file);
        }

        $this->assertSame($file, implode(' ', $resolveCmd->getFile()));
        $this->assertSame($expected . $file, $resolveCmd->asString());
    }
}
