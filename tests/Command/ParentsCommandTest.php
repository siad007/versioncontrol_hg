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

class ParentsCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function parentsCommand()
    {
        $parentsCmd = Factory::createParents();
        $parentsCmd->setFile('C:\\xampp\\file\\');
        $parentsCmd->setRev('revision');
        $parentsCmd->setTemplate('template');

        $file = '\'C:\xampp\file\\\'';
        $expected = 'hg parents --rev ' . escapeshellarg('revision') . ' --template ' . escapeshellarg('template') . ' ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $file = str_replace("'", '"', $file);
        }

        $this->assertSame($file, $parentsCmd->getFile());
        $this->assertSame($expected . $file, $parentsCmd->asString());
    }
}
