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

class BranchCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function branchCommand()
    {
        $branchCmd = Factory::createBranch();
        $branchCmd->setName('test');
        $branchCmd->setClean(true);
        $branchCmd->setForce(true);

        $name = '\'test\'';
        $expected = 'hg branch --force --clean ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $name = str_replace("'", '"', $name);
        }

        $this->assertSame($name, $branchCmd->getName());
        $this->assertSame($expected . $name, $branchCmd->asString());
    }
}
