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

class AddremoveCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function addremoveCommand()
    {
        $addremoveCmd = Factory::createAddremove();
        $addremoveCmd->addFile('C:\\xampp\\file1\\');
        $addremoveCmd->addFile('C:\\xampp\\file2\\');
        $addremoveCmd->setSimilarity('50');
        $addremoveCmd->addInclude('includePattern');
        $addremoveCmd->addExclude('excludePattern');
        $addremoveCmd->setDryRun(true);

        $file = '\'C:\xampp\file1\\\' \'C:\xampp\file2\\\'';
        $expected = 'hg addremove --similarity 50 --include includePattern --exclude excludePattern --dry-run ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $file = str_replace("'", '"', $file);
        }

        $this->assertSame($file, implode(' ', $addremoveCmd->getFile()));
        $this->assertSame($expected . $file, $addremoveCmd->run(true));
    }
}
