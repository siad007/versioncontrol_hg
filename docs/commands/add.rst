Add
===

Adds the specified files on the next commit.

Examples:

.. code-block:: php
    :linenos:

    use Siad007\VersionControl\HG\Factory;

    $addCmd = Factory::createAdd();
    $addCmd->run();
