Clone
=====

Makes a copy of an existing repository.

Examples:

.. code-block:: php
    :linenos:

    use Siad007\VersionControl\HG\Factory;

    $cloneCmd = Factory::createClone();
    $cloneCmd->setSource('/path/to/source');
    $cloneCmd->execute();
