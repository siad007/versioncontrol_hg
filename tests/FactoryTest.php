<?php

namespace Siad007\VersionControl\HG\Tests;

use Siad007\VersionControl\HG\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function instantiateInitCommand()
    {
        $initCommand = Factory::getInstance('init');

        $this->assertInstanceOf('\\Siad007\\VersionControl\\HG\\InitCommand', $initCommand);
    }
}
