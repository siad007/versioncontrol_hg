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
        $initCmd = Factory::createInit();
        $initCmd->setDestination('C:\\xampp\\dest\\');
        $initCmd->setSsh('testSSH');
        $initCmd->setInsecure(true);
        $initCmd->setVerbose(true);
        $initCmd->setEncoding('UTF-8');

        $destination = '\'C:\xampp\dest\\\'';
        $expected = 'hg init --verbose --encoding UTF-8 --ssh testSSH --insecure ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $destination = str_replace("'", '"', $destination);
        }

        $this->assertSame($destination, $initCmd->getDestination());
        $this->assertSame($expected . $destination, $initCmd->run(true));
    }
}
