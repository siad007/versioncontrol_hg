Version
=======

Outputs version and copyright informations.

Examples:

.. code-block:: php
    :linenos:

    use Siad007\VersionControl\HG\Factory;

    $versionCmd = Factory::createVersion();
    $versionCmd->run();
