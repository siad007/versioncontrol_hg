Unbundle
======

Applies one or more changegroup files.

Examples:

.. code-block:: php
    :linenos:

        use Siad007\VersionControl\HG\Factory;

        $unbundleCmd = Factory::createUnbundle();
        $unbundleCmd->addFile('C:\\xampp\\file1\\');
        $unbundleCmd->addFile('C:\\xampp\\file2\\');
        $unbundleCmd->setUpdate(true);
        $unbundleCmd->run();
