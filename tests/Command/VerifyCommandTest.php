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
        /* @var $verifyCmd \Siad007\VersionControl\HG\Command\VerifyCommand */
        $verifyCmd = Factory::getInstance('verify');

        $expected = 'hg verify';

        $this->assertSame($expected, $verifyCmd->run(true));
    }
}
