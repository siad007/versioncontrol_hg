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

class BookmarksCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function bookmarksCommand()
    {
        $bookmarksCmd = Factory::createBookmarks();
        $bookmarksCmd->addName('test1');
        $bookmarksCmd->addName('test2');
        $bookmarksCmd->setRev('revision');
        $bookmarksCmd->setForce(true);
        $bookmarksCmd->setRename('name');

        $name = '\'test1\' \'test2\'';
        $expected = 'hg bookmarks --force --rev revision --rename name ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $name = str_replace("'", '"', $name);
        }

        $this->assertSame($name, implode(' ', $bookmarksCmd->getName()));
        $this->assertSame($expected . $name, $bookmarksCmd->asString());
    }
}
