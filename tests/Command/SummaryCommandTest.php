<?php

namespace Siad007\VersionControl\HG\Tests\Command;

use Siad007\VersionControl\HG\Factory;

class SummaryCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function initCommand()
    {
        $summaryCmd = Factory::createSummary();
        $summaryCmd->setRemote(true);

        $expected = 'hg summary --remote';

        $this->assertSame($expected, $summaryCmd->run(true));
    }
}
