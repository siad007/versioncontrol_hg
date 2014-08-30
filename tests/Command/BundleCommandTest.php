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

class BundleCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function bundleCommand()
    {
        $bundleCmd = Factory::createBundle();
        $bundleCmd->setFile('C:\\xampp\\file\\');
        $bundleCmd->setSsh('testSSH');
        $bundleCmd->setInsecure(true);
        $bundleCmd->setVerbose(true);
        $bundleCmd->setEncoding('UTF-8');

        $destination = '\'C:\xampp\file\\\'';
        $expected = 'hg bundle --verbose --encoding UTF-8 --ssh testSSH --insecure ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $destination = str_replace("'", '"', $destination);
        }

        $this->assertSame($destination, $bundleCmd->getFile());
        $this->assertSame($expected . $destination, $bundleCmd->run(true));
    }
}
