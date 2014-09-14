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

class CopyCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function renameCommand()
    {
        $copyCmd = Factory::createCopy();
        $copyCmd->addSource('C:\\xampp\\source1\\');
        $copyCmd->addSource('C:\\xampp\\source2\\');
        $copyCmd->setDestination('C:\\xampp\\dest\\');
        $copyCmd->setAfter(true);
        $copyCmd->addInclude('includePattern');
        $copyCmd->addExclude('excludePattern');
        $copyCmd->setForce(true);
        $copyCmd->setDryRun(true);

        $source   = '\'C:\xampp\source1\\\' \'C:\xampp\source2\\\'';
        $dest     = '\'C:\xampp\dest\\\'';
        $expected = 'hg copy --after --force --include includePattern --exclude excludePattern --dry-run ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $source = str_replace("'", '"', $source);
            $dest   = str_replace("'", '"', $dest);
        }

        $this->assertSame($source, implode(' ', $copyCmd->getSource()));
        $this->assertSame($dest, $copyCmd->getDestination());
        $this->assertSame($expected . $source . ' ' . $dest, $copyCmd->asString());
    }
}
