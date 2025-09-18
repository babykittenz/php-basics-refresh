<?php
require 'partials/head.php';
require 'partials/nav.php';
require 'partials/banner.php';
?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="rounded-lg bg-gray-800/50 p-6">
                    <p class="text-white text-sm" ><em> <?= $note['body']  ?> </em></p>
            </div>
        </div>
    </main>
<?php require 'partials/footer.php'; ?>