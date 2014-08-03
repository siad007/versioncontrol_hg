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
        $initCmd->setDestination('C:\\xampp\\dest\\');
        $initCmd->setSsh('testSSH');
        $initCmd->setInsecure(true);
        $initCmd->setVerbose(true);
        $initCmd->setEncoding('UTF-8');

        $expected = 'hg init --verbose --encoding UTF-8 --ssh testSSH --insecure \'C:\xampp\dest\'';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $expected = str_replace("'", '"', $expected);
        }

        $this->assertSame($expected, $initCmd->run(true));
    }
}
