Summary
=======

Summarizes the working directory state.

Examples:

.. code-block:: php
    :linenos:

    use Siad007\VersionControl\HG\Factory;

    $summaryCmd = Factory::createSummary();
    $summaryCmd->run();
