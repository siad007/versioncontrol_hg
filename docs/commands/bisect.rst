Bisect
======

Shows changeset information by line for each file.

Examples:

.. code-block:: php
    :linenos:

        use Siad007\VersionControl\HG\Factory;

        $bisecCmd = Factory::createBisec();
        $bisecCmd->setBad(true);
        $bisecCmd->setExtend(true);
