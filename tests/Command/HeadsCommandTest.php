<?php

namespace Siad007\VersionControl\HG\Tests\Command;

use Siad007\VersionControl\HG\Factory;

class HeadsCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function headsCommand()
    {
        $headsCmd = Factory::createHeads();
        $headsCmd->setTemplate('template');
        $headsCmd->setClosed(true);
        $headsCmd->setRev('startrev');
        $headsCmd->setTopo(true);

        $expected = 'hg heads --rev startrev --topo --closed --template template';

        $this->assertSame($expected, $headsCmd->run(true));
    }
}
