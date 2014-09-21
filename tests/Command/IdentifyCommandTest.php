<?php
/**
 * VersionControl_HG
 * Simple OO implementation for Mercurial.
 *
 * PHP Version 5.4
 *
 * @copyright 2014 Siad Ardroumli
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link http://siad007.github.io/versioncontrol_hg
 */
namespace Siad007\VersionControl\HG\Tests\Command;

use Siad007\VersionControl\HG\Factory;
use Siad007\VersionControl\HG\Tests\Helpers\TestCase;

class IdentifyCommandTest extends TestCase
{
    /**
     * @test
     */
    public function identifyCommand()
    {
        $identifyCmd = Factory::createIdentify();
        $identifyCmd->setSource('C:\\xampp\\source\\');
        $identifyCmd->setNum(true);
        $identifyCmd->setInsecure(true);

        $source = '\'C:\xampp\source\\\'';
        $expected = "hg identify --num --insecure ";

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $source = str_replace("'", '"', $source);
        }

        $this->assertSame($source, $identifyCmd->getSource());
        $this->assertSame($expected . $source, $identifyCmd->asString());
    }
}
