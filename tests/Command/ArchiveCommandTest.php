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

class ArchiveCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function archiveCommand()
    {
        $archiveCmd = Factory::createArchive();
        $archiveCmd->setDestination('C:\\xampp\\dest\\');
        $archiveCmd->addInclude('includePattern');
        $archiveCmd->addExclude('excludePattern');
        $archiveCmd->setSubrepos(true);
        $archiveCmd->setNoDecode(true);

        $destination = '\'C:\xampp\dest\\\'';
        $expected = 'hg archive --no-decode --subrepos --include includePattern --exclude excludePattern ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $destination = str_replace("'", '"', $destination);
        }

        $this->assertSame($destination, $archiveCmd->getDestination());
        $this->assertSame($expected . $destination, $archiveCmd->asString());
    }
}
