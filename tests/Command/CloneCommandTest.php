<?php

namespace Siad007\VersionControl\HG\Tests\Command;

use Siad007\VersionControl\HG\Factory;

class CloneCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function cloneCommand()
    {
        /* @var $cloneCmd \Siad007\VersionControl\HG\Command\CloneCommand */
        $cloneCmd = Factory::getInstance('clone');
        $cloneCmd->setSource('C:\\xampp\\source');
        $cloneCmd->setDestination('C:\\xampp\\dest');
        $cloneCmd->setUncompressed(true);
        $cloneCmd->setInsecure(true);

        $this->assertSame(
            'hg clone --uncompressed --insecure "C:\xampp\source" "C:\xampp\dest"',
            $cloneCmd->run(true)
        );
    }
}
