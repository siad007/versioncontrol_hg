<?php

namespace Siad007\VersionControl\HG\Tests;

use Siad007\VersionControl\HG\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function instantiateHgCommands()
    {
        $commands = [
            'clone',
            'init',
            'paths',
            'pull',
            'push',
            'root',
            'summary',
            'tags',
            'update',
            'verify',
            'version'
        ];

        foreach ($commands as $command) {
            $this->assertInstanceOf(
                sprintf('Siad007\VersionControl\HG\Command\%sCommand', $command),
                Factory::getInstance($command)
            );
        }
    }
}
