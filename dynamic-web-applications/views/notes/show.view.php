<?php
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');
?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="rounded-lg bg-gray-800/50 p-6">
                    <p class="text-white text-sm" ><em> <?= htmlspecialchars($note['body'])  ?> </em></p>
            </div>
        </div>
<!--  we use a button to delete the note to make it idempotent which we avoid an anchor tags GET request to do that-->
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-start gap-2 align-center">
            <div class="mt-6 flex items-center justify-start gap-x-6">
            <form class="" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">Delete</button>
            </form>
            <a href="/note/edit?id=<?= $note['id'] ?>" class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-500">Edit</a>
            </div>
        </div>
    </main>
<?php require base_path('views/partials/footer.php'); ?>