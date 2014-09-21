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

class ImportCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function importCommand()
    {
        $commitCmd = Factory::createImport();
        $commitCmd->addPatch('patch1');
        $commitCmd->addPatch('patch2');
        $commitCmd->setStrip('num');
        $commitCmd->setEdit(true);
        $commitCmd->setNoCommit(true);
        $commitCmd->setBypass(true);
        $commitCmd->setExact(true);
        $commitCmd->setImportBranch(true);
        $commitCmd->setMessage('text');
        $commitCmd->setLogfile('logfile');
        $commitCmd->setDate('date');
        $commitCmd->setUser('user');
        $commitCmd->setSimilarity('similarity');

        $patch = '\'patch1\' \'patch2\'';
        $expected = 'hg import --strip num --edit --no-commit --bypass --exact --import-branch --message text --logfile logfile --date date --user user --similarity similarity ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $patch = str_replace("'", '"', $patch);
        }

        $this->assertSame($patch, implode(' ', $commitCmd->getPatch()));
        $this->assertSame($expected . $patch, $commitCmd->asString());
    }
}
