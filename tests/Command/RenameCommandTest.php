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

class RenameCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function renameCommand()
    {
        $renameCmd = Factory::createRename();
        $renameCmd->addSource('C:\\xampp\\source1\\');
        $renameCmd->addSource('C:\\xampp\\source2\\');
        $renameCmd->setDestination('C:\\xampp\\dest\\');
        $renameCmd->setAfter(true);
        $renameCmd->addInclude('includePattern');
        $renameCmd->addExclude('excludePattern');
        $renameCmd->setForce(true);

        $source   = '\'C:\xampp\source1\\\' \'C:\xampp\source2\\\'';
        $dest     = '\'C:\xampp\dest\\\'';
        $expected = 'hg rename --after --force --include includePattern --exclude excludePattern ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $source = str_replace("'", '"', $source);
            $dest   = str_replace("'", '"', $dest);
        }

        $this->assertSame($source, implode(' ', $renameCmd->getSource()));
        $this->assertSame($dest, $renameCmd->getDestination());
        $this->assertSame($expected . $source . ' ' . $dest, $renameCmd->asString());
    }
}
