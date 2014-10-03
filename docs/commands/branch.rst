Branch
======

Sets or shows the current branch name.

Examples:

.. code-block:: php
    :linenos:

        use Siad007\VersionControl\HG\Factory;

        $branchCmd = Factory::createBranch();
        $branchCmd->setName('test');
        $branchCmd->setClean(true);
        $branchCmd->setForce(true);
