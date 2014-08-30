Paths
=====

Shows aliases for remote repositories.

Examples:

.. code-block:: php
    :linenos:

    use Siad007\VersionControl\HG\Factory;

    $pathsCmd = Factory::createPaths();
    $pathsCmd->execute();
