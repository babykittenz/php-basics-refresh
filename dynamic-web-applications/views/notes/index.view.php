<?php
require 'views/partials/head.php';
require 'views/partials/nav.php';
require 'views/partials/banner.php';
?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="rounded-lg bg-gray-800/50 p-6">
                <h2 class="text-xl font-semibold text-white mb-4">Welcome to your Notes</h2>
                <?php foreach ($notes as $note) : ?>
                    <li class="text-blue-500 text-underline"><a class="text-blue underline" href="/note?id=<?= $note['id']?>"> <?= htmlspecialchars($note['title']) ?> </a></li>
                <?php endforeach; ?>
            </div>

            <div class="mt-6">
                <a href="/notes/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create New Note
                </a>
            </div>
        </div>
    </main>
<?php require 'views/partials/footer.php'; ?>