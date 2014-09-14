<?php

namespace Siad007\VersionControl\HG\Tests\Extension\Constraint;

use PHPUnit_Framework_Constraint as Constraint;

class HasError extends Constraint
{
    protected $errorstr;

    protected $errorno;

    protected $errors = array();

    public function setErrorStr($errorstr)
    {
        $this->errorstr = $errorstr;
    }

    public function setErrorNo($errorno)
    {
        $this->errorno = $errorno;
    }

    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    public function toString()
    {
        return sprintf("Error with level %s and message '%s' not found in ", $this->errorno, $this->errorstr);
    }

    public function evaluate($other, $description = '', $returnResult = FALSE)
    {
        foreach ($this->errors as $error) {
            if ($error["errstr"] === $this->errorstr && $error["errno"] === $this->errorno) {
                return;
            }
        }

        $this->fail($other, sprintf("Error with level %s and message '%s' not found in ", $this->errorno, $this->errorstr));
    }
}
