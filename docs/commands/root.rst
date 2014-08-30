Root
====

Prints the root (top) of the current working directory.

Examples:

.. code-block:: php
    :linenos:

    use Siad007\VersionControl\HG\Factory;

    $rootCmd = Factory::createRoot();
    $rootCmd->execute();
