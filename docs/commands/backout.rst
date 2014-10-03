Backout
=======

Reverses effect of earlier changeset.

Examples:

.. code-block:: php
    :linenos:

        use Siad007\VersionControl\HG\Factory;

        $backoutCmd = Factory::createBackout();
        $backoutCmd->setRevision('revision');
        $backoutCmd->setMerge(true);
        $backoutCmd->setTool('tool');
        $backoutCmd->addInclude('includePattern');
        $backoutCmd->addExclude('excludePattern');
        $backoutCmd->setMessage('text');
        $backoutCmd->setLogfile('logfile');
        $backoutCmd->setDate('date');
        $backoutCmd->setUser('user');
