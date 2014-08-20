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

class CommitCommandTestCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function commitCommand()
    {
        $commitCmd = Factory::createCommit();
        $commitCmd->addFile('C:\\xampp\\file1\\');
        $commitCmd->addFile('C:\\xampp\\file2\\');
        $commitCmd->setAddremove(true);
        $commitCmd->setCloseBranch(true);
        $commitCmd->setAmend(true);
        $commitCmd->setSecret(true);
        $commitCmd->setEdit(true);
        $commitCmd->addInclude('includePattern');
        $commitCmd->addExclude('excludePattern');
        $commitCmd->setMessage('text');
        $commitCmd->setLogfile('logfile');
        $commitCmd->setDate('date');
        $commitCmd->setUser('user');
        $commitCmd->setSubrepos(true);

        $file = '\'C:\xampp\file1\\\' \'C:\xampp\file2\\\'';
        $expected = 'hg commit --addremove --close-branch --amend --secret --edit --include includePattern --exclude excludePattern --message text --logfile logfile --date date --user user --subrepos ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $file = str_replace("'", '"', $file);
        }

        $this->assertSame($file, implode(' ', $commitCmd->getFile()));
        $this->assertSame($expected . $file, $commitCmd->run(true));
    }
}
