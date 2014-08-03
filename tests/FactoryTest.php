<?php

namespace Siad007\VersionControl\HG\Tests;

use Siad007\VersionControl\HG\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function instantiateCloneCommand()
    {
        $cloneCommand = Factory::getInstance('clone');

        $this->assertInstanceOf('Siad007\VersionControl\HG\Command\CloneCommand', $cloneCommand);
    }

    /**
     * @test
     */
    public function instantiateInitCommand()
    {
        $initCommand = Factory::getInstance('init');

        $this->assertInstanceOf('Siad007\VersionControl\HG\Command\InitCommand', $initCommand);
    }

    /**
     * @test
     */
    public function instantiatePathsCommand()
    {
        $pathsCommand = Factory::getInstance('paths');

        $this->assertInstanceOf('Siad007\VersionControl\HG\Command\PathsCommand', $pathsCommand);
    }
}
