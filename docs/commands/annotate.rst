Annotate
========

Shows changeset information by line for each file.

Examples:

.. code-block:: php
    :linenos:

        use Siad007\VersionControl\HG\Factory;

        $annotateCmd = Factory::createAnnotate();
        $annotateCmd->addFile('C:\\xampp\\file1\\');
        $annotateCmd->addFile('C:\\xampp\\file2\\');
        $annotateCmd->setNoFollow(true);
