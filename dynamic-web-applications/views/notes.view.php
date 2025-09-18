<?php
require 'partials/head.php';
require 'partials/nav.php';
require 'partials/banner.php';
?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="rounded-lg bg-gray-800/50 p-6">
                <h2 class="text-xl font-semibold text-white mb-4">Welcome to your Notes</h2>
                <?php foreach ($notes as $note) : ?>
                    <li class="text-blue-500 text-underline"><a class="text-blue underline" href="/note?id=<?= $note['id']?>"> <?= $note['body'] ?> </a></li>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
<?php require 'partials/footer.php'; ?>