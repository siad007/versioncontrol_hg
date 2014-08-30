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

class PushCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function pushCommand()
    {
        /* @var $pushCmd \Siad007\VersionControl\HG\Command\PushCommand */
        $pushCmd = Factory::getInstance('push');
        $pushCmd->setDestination('C:\\xampp\\dest\\');
        $pushCmd->setSsh('testSSH');
        $pushCmd->setInsecure(true);
        $pushCmd->setVerbose(true);
        $pushCmd->setEncoding('UTF-8');

        $destination = '\'C:\xampp\dest\\\'';
        $expected = 'hg push --verbose --encoding UTF-8 --ssh testSSH --insecure ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $destination = str_replace("'", '"', $destination);
        }

        $this->assertSame($destination, $pushCmd->getDestination());
        $this->assertSame($expected . $destination, $pushCmd->asString());
    }
}
