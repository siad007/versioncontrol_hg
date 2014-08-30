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

class TagCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function tagCommand()
    {
        $tagCmd = Factory::createTag();
        $tagCmd->addFile('C:\\xampp\\file1\\');
        $tagCmd->addFile('C:\\xampp\\file2\\');
        $tagCmd->setForce(true);
        $tagCmd->setLocal(true);
        $tagCmd->setRev('test');
        $tagCmd->setRemove(true);
        $tagCmd->setEdit(true);
        $tagCmd->setMessage('text');
        $tagCmd->setDate('date');
        $tagCmd->setUser('user');

        $file = '\'C:\xampp\file1\\\' \'C:\xampp\file2\\\'';
        $expected = 'hg tag --force --local --rev test --remove --edit --message text --date date --user user ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $file = str_replace("'", '"', $file);
        }

        $this->assertSame($file, implode(' ', $tagCmd->getFile()));
        $this->assertSame($expected . $file, $tagCmd->run(true));
    }
}
