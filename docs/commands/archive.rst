Archive
=======

Creates an unversioned archive of a repository revision.

Examples:

.. code-block:: php
    :linenos:

        use Siad007\VersionControl\HG\Factory;

        $archiveCmd = Factory::createArchive();
        $archiveCmd->setDestination('C:\\xampp\\dest\\');
        $archiveCmd->addInclude('includePattern');
        $archiveCmd->addExclude('excludePattern');
        $archiveCmd->setSubrepos(tru);
        $archiveCmd->setNoDecode(true);
        $archiveCmd->execute();
