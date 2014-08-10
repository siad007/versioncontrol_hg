Init
====

Creates a new repository in the given directory.

Examples:

.. code-block:: php
    :linenos:

    use Siad007\VersionControl\HG\Factory;

    $initCmd = Factory::createInit();
    $initCmd->setDestination('/path/to/destination');
    $initCmd->run();
