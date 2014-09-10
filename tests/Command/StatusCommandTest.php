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

class StatusCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function archiveCommand()
    {
        $statusCmd = Factory::createStatus();
        $statusCmd->addFile('C:\\xampp\\file\\');
        $statusCmd->addInclude('includePattern');
        $statusCmd->addExclude('excludePattern');
        $statusCmd->setSubrepos(true);

        $file = '\'C:\xampp\file\\\'';
        $expected = 'hg status --include includePattern --exclude excludePattern --subrepos ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $file = str_replace("'", '"', $file);
        }

        $this->assertSame($file, implode(' ', $statusCmd->getFile()));
        $this->assertSame($expected . $file, $statusCmd->asString());
    }
}
