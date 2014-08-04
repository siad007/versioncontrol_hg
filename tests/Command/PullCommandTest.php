<?php

namespace Siad007\VersionControl\HG\Tests\Command;

use Siad007\VersionControl\HG\Factory;

class PullCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function pullCommand()
    {
        /* @var $pullCmd \Siad007\VersionControl\HG\Command\PullCommand */
        $pullCmd = Factory::getInstance('pull');
        $pullCmd->setSource('C:\\xampp\\source\\');
        $pullCmd->setSsh('testSSH');
        $pullCmd->setInsecure(true);
        $pullCmd->setVerbose(true);
        $pullCmd->setEncoding('UTF-8');

        $source = '\'C:\xampp\source\\\'';
        $expected = 'hg pull --verbose --encoding UTF-8 --ssh testSSH --insecure ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $source = str_replace("'", '"', $source);
        }

        $this->assertSame($source, $pullCmd->getSource());
        $this->assertSame($expected . $source, $pullCmd->run(true));
    }
}
