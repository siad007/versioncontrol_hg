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
