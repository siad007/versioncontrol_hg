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

class LogCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function logCommand()
    {
        $logCmd = Factory::createLog();
        $logCmd->setFile('C:\\xampp\\file\\')
            ->addInclude('includePattern')
            ->addExclude('excludePattern')
            ->setFollow(true)
            ->setCopies(true);

        $file = '\'C:\xampp\file\\\'';
        $expected = 'hg log --follow --copies --include includePattern --exclude excludePattern ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $file = str_replace("'", '"', $file);
        }

        $this->assertSame($file, $logCmd->getFile());
        $this->assertSame($expected . $file, $logCmd->asString());
    }
}
