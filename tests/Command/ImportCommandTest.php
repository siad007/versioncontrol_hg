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
        $importCmd = Factory::createImport();
        $importCmd->addPatch('patch1');
        $importCmd->addPatch('patch2');
        $importCmd->setStrip('num');
        $importCmd->setEdit(true);
        $importCmd->setNoCommit(true);
        $importCmd->setBypass(true);
        $importCmd->setExact(true);
        $importCmd->setImportBranch(true);
        $importCmd->setMessage('text');
        $importCmd->setLogfile('logfile');
        $importCmd->setDate('date');
        $importCmd->setUser('user');
        $importCmd->setSimilarity('similarity');

        $patch = '\'patch1\' \'patch2\'';
        $expected = 'hg import --strip ' . escapeshellarg('num') . ' --edit --no-commit --bypass --exact --import-branch --message ' . escapeshellarg('text') . ' --logfile ' . escapeshellarg('logfile') . ' --date ' . escapeshellarg('date') . ' --user ' . escapeshellarg('user') . ' --similarity ' . escapeshellarg('similarity') . ' ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $patch = str_replace("'", '"', $patch);
        }

        $this->assertSame($patch, implode(' ', $importCmd->getPatch()));
        $this->assertSame($expected . $patch, $importCmd->asString());
    }
}
