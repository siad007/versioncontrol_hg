<?php

namespace Siad007\VersionControl\HG\Tests\Command;

use Siad007\VersionControl\HG\Factory;

class VerifyCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function verifyCommand()
    {
        $verifyCmd = Factory::createVerify();

        $expected = 'hg verify';

        $this->assertSame($expected, $verifyCmd->run(true));
    }
}
