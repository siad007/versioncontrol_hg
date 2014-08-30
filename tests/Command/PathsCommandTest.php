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

class PathsCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function pathsCommand()
    {
        /* @var $pathsCmd \Siad007\VersionControl\HG\Command\PathsCommand */
        $pathsCmd = Factory::getInstance('paths');
        $pathsCmd->setName('test');

        $expected = 'hg paths test';

        $this->assertSame('test', $pathsCmd->getName());
        $this->assertSame($expected, $pathsCmd->asString());
    }
}
