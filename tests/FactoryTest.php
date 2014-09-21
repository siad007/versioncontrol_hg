<?php

namespace Siad007\VersionControl\HG\Tests;

use Siad007\VersionControl\HG\Factory;

class FactoryTest extends Helpers\TestCase
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

    /**
     * @test
     */
    public function privateConstructor()
    {
        $refClass  = new \ReflectionClass('\\Siad007\\VersionControl\\HG\\Factory');
        $refMethod = $refClass->getConstructor();

        $this->assertTrue($refMethod->isPrivate());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function notExistingCommand()
    {
        Factory::getInstance('test');
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function invokeByNonCreate()
    {
        Factory::nonExisting('test');
    }

    /**
     * @test
     */
    public function executeCommand()
    {
        $expected = "Mercurial Distributed SCM (version 3.0.2)\r\n(see http://mercurial.selenic.com for more information)\r\n\r\nCopyright (C) 2005-2014 Matt Mackall and others\r\nThis is free software; see the source for copying conditions. There is NO\r\nwarranty; not even for MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.";

        $this->assertSame($expected, Factory::createVersion()->execute());
    }
}
