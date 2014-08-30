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

class UnbundleCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function unbundleCommand()
    {
        $unbundleCmd = Factory::createUnbundle();
        $unbundleCmd->addFile('C:\\xampp\\file1\\');
        $unbundleCmd->addFile('C:\\xampp\\file2\\');
        $unbundleCmd->setUpdate(true);

        $file = '\'C:\xampp\file1\\\' \'C:\xampp\file2\\\'';
        $expected = 'hg unbundle --update ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $file = str_replace("'", '"', $file);
        }

        $this->assertSame($file, implode(' ', $unbundleCmd->getFile()));
        $this->assertSame($expected . $file, $unbundleCmd->asString());
    }
}
