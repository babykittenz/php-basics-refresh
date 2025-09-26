<?php
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');
?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <form action="#" method="POST">
                <div class="space-y-12">
                    <div class="border-b border-white/10 pb-12">
                        <h2 class="text-base/7 font-semibold text-white">Create a Note</h2>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="title" class="block text-sm/6 font-medium text-white">Title</label>
                                <div class="mt-2">
                                    <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                        <input id="title" type="text" name="title" placeholder="Enter a title" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" value="<?= $_POST['title'] ?? ''  ?>"/>
                                    </div>
                                    <?php if (isset($errors['title'])): ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['title'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="body" class="block text-sm/6 font-medium text-white">Note</label>
                                <div class="mt-2">
                                    <textarea placeholder="Enter a note" id="body" name="body" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"><?= $_POST['body'] ?? ''  ?></textarea>
                                    <?php if (isset($errors['body'])): ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-start gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                </div>
            </form>

        </div>
    </main>
<?php require base_path('views/partials/footer.php'); ?>