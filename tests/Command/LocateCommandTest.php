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

class LocateCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function locateCommand()
    {
        $locateCmd = Factory::createLocate();
        $locateCmd->addPattern('test');
        $locateCmd->setFullpath(true);
        $locateCmd->addInclude('includePattern');
        $locateCmd->addExclude('excludePattern');

        $pattern = '\'test\'';
        $expected = 'hg locate --fullpath --include includePattern --exclude excludePattern ';

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $pattern = str_replace("'", '"', $pattern);
        }

        $this->assertSame($pattern, implode(' ', $locateCmd->getPattern()));
        $this->assertSame($expected . $pattern, $locateCmd->asString());
    }
}
