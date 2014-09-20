<?php

namespace Siad007\VersionControl\HG\Tests\Helpers;

class TestCase extends \PHPUnit_Framework_TestCase
{
    private $errors;

    protected function setUp()
    {
        $this->errors = array();
        set_error_handler(array($this, "errorHandler"));
    }

    public function errorHandler($errno, $errstr, $errfile, $errline, $errcontext)
    {
        $this->errors[] = compact("errno", "errstr", "errfile", "errline", "errcontext");
    }

    /**
     * Assert Error.
     *
     * @param string $errstr
     * @param int $errno
     *
     * @return bool
     *
     */
    public function assertError($errstr, $errno)
    {
        foreach ($this->errors as $error) {
            if ($error["errstr"] === $errstr && $error["errno"] === $errno) {
                return $this->assertTrue(true);
            }
        }

        $this->fail(sprintf("Error with level %s and message '%s' not found in ", $errno, $errstr));
    }
}
