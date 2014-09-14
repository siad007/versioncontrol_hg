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

class BackoutCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function backoutCommand()
    {
        $backoutCmd = Factory::createBackout();
        $backoutCmd->setRevision('revision');
        $backoutCmd->setMerge(true);
        $backoutCmd->setTool('tool');
        $backoutCmd->addInclude('includePattern');
        $backoutCmd->addExclude('excludePattern');
        $backoutCmd->setMessage('text');
        $backoutCmd->setLogfile('logfile');
        $backoutCmd->setDate('date');
        $backoutCmd->setUser('user');

        $revision = '\'revision\'';
        $expected = 'hg backout --merge --tool tool --include includePattern --exclude excludePattern --message text --logfile logfile --date date --user user ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $revision = str_replace("'", '"', $revision);
        }

        $this->assertSame($revision, $backoutCmd->getRevision());
        $this->assertSame($expected . $revision, $backoutCmd->asString());
    }
}
