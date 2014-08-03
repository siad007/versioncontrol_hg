<?php

namespace Siad007\VersionControl\HG\Tests\Command;

use Siad007\VersionControl\HG\Factory;

class RootCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function rootCommand()
    {
        /* @var $rootCmd \Siad007\VersionControl\HG\Command\RootCommand */
        $rootCmd = Factory::getInstance('root');

        $expected = 'hg root';

        $this->assertSame($expected, $rootCmd->run(true));
    }
}
