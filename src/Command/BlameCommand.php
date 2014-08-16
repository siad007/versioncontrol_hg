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

namespace Siad007\VersionControl\HG\Command;

/**
 * Alias for AnnotateCommand.
 *
 * @uses AnnotateCommand
 *
 * @method string getRev()
 * @method void setRev(string $output)
 * @method boolean getNoFollow()
 * @method void setNoFollow(boolean $flag)
 * @method boolean getText()
 * @method void setText(boolean $flag)
 * @method boolean getUser()
 * @method void setUser(boolean $flag)
 * @method boolean getFile()
 * @method void setFile(boolean $flag)
 * @method boolean getDate()
 * @method void setDate(boolean $flag)
 * @method boolean getNumber()
 * @method void setNumber(boolean $flag)
 * @method boolean getChangeset()
 * @method void setChangeset(boolean $flag)
 * @method boolean getLineNumber()
 * @method void setLineNumber(boolean $flag)
 * @method boolean getIgnoreAllSpace()
 * @method void setIgnoreAllSpace(boolean $flag)
 * @method boolean getIgnoreSpaceChange()
 * @method void setIgnoreSpaceChange(boolean $flag)
 * @method boolean getIgnoreBlankLines()
 * @method void setIgnoreBlankLines(boolean $flag)
 * @method array getInclude()
 * @method void addInclude(string $pattern)
 * @method array getExclude()
 * @method void addExclude(string $pattern)
 */
class BlameCommand extends AnnotateCommand
{
}
