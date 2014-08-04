<?php

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
        $this->assertSame($expected, $pathsCmd->run(true));
    }
}
