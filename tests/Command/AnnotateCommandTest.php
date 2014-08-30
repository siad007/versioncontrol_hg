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

class AnnotateCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function annotateCommand()
    {
        $annotateCmd = Factory::createAnnotate();
        $annotateCmd->addFile('C:\\xampp\\file1\\');
        $annotateCmd->addFile('C:\\xampp\\file2\\');
        $annotateCmd->setNoFollow(true);

        $file = '\'C:\xampp\file1\\\' \'C:\xampp\file2\\\'';
        $expected = 'hg annotate --no-follow ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $file = str_replace("'", '"', $file);
        }

        $this->assertSame($file, implode(' ', $annotateCmd->getFile()));
        $this->assertSame($expected . $file, $annotateCmd->asString());
    }
}
