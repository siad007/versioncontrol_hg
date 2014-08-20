Commit
======

Commitss the specified files and delete all missing files.

Examples:

.. code-block:: php
    :linenos:

    use Siad007\VersionControl\HG\Factory;

    $commitCmd = Factory::createCommit();
    $commitCmd->setAddremove(true);
    $commitCmd->setCloseBranch(true);
    $commitCmd->setMessage('First commit.');
    $commitCmd->setSubrepos(true);
