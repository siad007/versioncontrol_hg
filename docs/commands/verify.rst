Verify
======

Verifies the integrity of the repository.

Examples:

.. code-block:: php
    :linenos:

    use Siad007\VersionControl\HG\Factory;

    $verifyCmd = Factory::createVerify();
    $verifyCmd->run();
