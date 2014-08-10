Heads
=====

Shows branch heads.

Examples:

.. code-block:: php
    :linenos:

    use Siad007\VersionControl\HG\Factory;

    $headsCmd = Factory::createHeads();
    $headsCmd->run();
