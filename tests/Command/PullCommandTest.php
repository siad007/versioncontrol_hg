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
        $pullCmd->addRev('rev1');
        $pullCmd->addRev('rev2');
        $pullCmd->addBookmark('bookmark');
        $pullCmd->addBranch('branch');
        $pullCmd->setSsh('testSSH');
        $pullCmd->setInsecure(true);
        $pullCmd->setVerbose(true);
        $pullCmd->setEncoding('UTF-8');

        $source = '\'C:\xampp\source\\\'';
        $expected = 'hg pull --verbose --encoding UTF-8 --rev rev1 rev2 --bookmark bookmark --branch branch --ssh testSSH --insecure ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $source = str_replace("'", '"', $source);
        }

        $this->assertSame($source, $pullCmd->getSource());
        $this->assertSame($expected . $source, $pullCmd->run(true));
    }
}
