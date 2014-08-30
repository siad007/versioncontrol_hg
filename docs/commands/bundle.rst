Bundle
======

Creates a changegroup file

Examples:

.. code-block:: php
    :linenos:

        use Siad007\VersionControl\HG\Factory;

        $bundleCmd = Factory::createBundle();
        $bundleCmd->setFile('C:\\xampp\\file\\');
        $bundleCmd->setSsh('testSSH');
        $bundleCmd->setInsecure(true);
        $bundleCmd->setVerbose(true);
        $bundleCmd->setEncoding('UTF-8');
        $bundleCmd->execute();

