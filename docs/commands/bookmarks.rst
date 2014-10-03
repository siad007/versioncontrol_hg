Bookmarks
=========

Tracks a line of development with movable markers.

Examples:

.. code-block:: php
    :linenos:

        use Siad007\VersionControl\HG\Factory;

        $bookmarksCmd = Factory::createBookmarks();
        $bookmarksCmd->addName('test');
        $bookmarksCmd->setRev('revision');
        $bookmarksCmd->setForce(true);
