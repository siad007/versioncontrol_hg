Addremove
=========

Adds all new files and delete all missing files.

Examples:

.. code-block:: php
    :linenos:

    use Siad007\VersionControl\HG\Factory;

    $addremoveCmd = Factory::createAddremove();
    $addremoveCmd->execute();
