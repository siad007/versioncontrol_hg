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

class CatCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function catCommand()
    {
        $catCmd = Factory::createCat();
        $catCmd->addFile('C:\\xampp\\file1\\');
        $catCmd->addFile('C:\\xampp\\file2\\');
        $catCmd->setRev('revision');
        $catCmd->setOutput('output');
        $catCmd->addInclude('includePattern');
        $catCmd->addExclude('excludePattern');
        $catCmd->setDecode(true);

        $file = '\'C:\xampp\file1\\\' \'C:\xampp\file2\\\'';
        $expected = 'hg cat --output ' . escapeshellarg('output') . ' --rev ' . escapeshellarg('revision') . ' --decode --include includePattern --exclude excludePattern ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $file = str_replace("'", '"', $file);
        }

        $this->assertSame($file, implode(' ', $catCmd->getFile()));
        $this->assertSame($expected . $file, $catCmd->asString());
    }
}
