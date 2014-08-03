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

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $expected = str_replace("'", '"', $expected);
        }

        $this->assertSame($expected, $pathsCmd->run(true));
    }
}
