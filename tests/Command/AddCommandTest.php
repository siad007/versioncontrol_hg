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

class AddCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function addCommand()
    {
        $addCmd = Factory::createAdd();
        $addCmd->addFile('C:\\xampp\\file\\');
        $addCmd->addInclude('includePattern');
        $addCmd->addExclude('excludePattern');
        $addCmd->setSubrepos(true);
        $addCmd->setDryRun(true);

        $file = '\'C:\xampp\file\\\'';
        $expected = 'hg add --include includePattern --exclude excludePattern --subrepos --dry-run ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $file = str_replace("'", '"', $file);
        }

        $this->assertSame($file, implode(' ', $addCmd->getFile()));
        $this->assertSame($expected . $file, $addCmd->asString());
    }
}
