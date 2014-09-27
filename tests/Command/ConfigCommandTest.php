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

class ConfigCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function configCommand()
    {
        $configCmd = Factory::createConfig()
            ->addName('test')
            ->setUntrusted(true)
            ->setEdit(true)
            ->setLocal(true)
            ->setGlobal(true);

        $name = '\'test\'';
        $expected = 'hg config --untrusted --edit --local --global ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $name = str_replace("'", '"', $name);
        }

        $this->assertSame($name, implode(' ', $configCmd->getName()));
        $this->assertSame($expected . $name, $configCmd->asString());
    }
}
