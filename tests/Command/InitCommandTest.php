<?php

namespace Siad007\VersionControl\HG\Tests\Command;

use Siad007\VersionControl\HG\Factory;

class InitCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function initCommand()
    {
        $initCmd = Factory::getInstance('init');
        $initCmd->setDestination('C:\\xampp\\');
        $initCmd->setSsh('testSSH');
        $initCmd->setInsecure(true);
        $initCmd->setVerbose(true);
        $initCmd->setEncoding('UTF-8');

        $this->assertSame(
            'hg init --verbose --encoding UTF-8 --ssh testSSH --insecure "C:\xampp\"',
            $initCmd->run(true)
        );
    }
}
