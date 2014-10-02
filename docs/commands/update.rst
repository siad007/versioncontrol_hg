Update
======

Updates working directory (or switches revisions)

Examples:

.. code-block:: php
    :linenos:

        use Siad007\VersionControl\HG\Factory;

        $updateCmd = Factory::createUpdate();
        $updateCmd->setClean(true);
        $updateCmd->execute();
