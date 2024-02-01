<?php require APPROOT . '/views/author/header.php'; ?>

<div class="max-w-2xl mx-auto mt-4 mb-4 px-4 py-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="flex items-center justify-between">
        <span class="text-sm font-light text-gray-600 dark:text-gray-400">
            <?php echo $data['wiki']->creation_date; ?>
        </span>
        <span class="text-xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">
            <?php echo $data['wiki']->category_name; ?>
        </span>
        <?php if (is_array($data['wiki']->tags) || (is_string($data['wiki']->tags) && !empty($data['wiki']->tags))):
            $tags = is_array($data['wiki']->tags) ? $data['wiki']->tags : explode(',', $data['wiki']->tags);
            foreach ($tags as $tag):
                ?>
                <div
                    class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-300 transform bg-gray-600 rounded hover:bg-gray-500">
                    <?php echo trim($tag); ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="mt-2">
        <p
            class="text-xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">
            created by :
            <?php echo $data['wiki']->username; ?>
        </p>
        <p
            class="text-xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">
            Title :
            <?php echo $data['wiki']->title; ?>
        </p>
        <p class="mt-2 text-gray-600 dark:text-gray-300">
            content :
            <?php echo $data['wiki']->content; ?>
        </p>
    </div>
    <?php if ($data['wiki']->author_id == $_SESSION['user_id']): ?>
        <div class="flex items-center justify-between mt-4">
            <div class="flex">
                <a href="<?php echo URLROOT; ?>/author/updateWiki/<?php echo $data['wiki']->wiki_id; ?>"
                    class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600"><i
                        class="fa-solid fa-pen-clip fa-xl"></i></a>
            </div>
            <div>
                <a href="<?php echo URLROOT; ?>/author/deleteWiki/<?php echo $data['wiki']->wiki_id; ?>"
                    class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600"><i
                        class="fa-solid fa-trash fa-xl"></i></a>
            </div>
        </div>
    <?php endif; ?>

</div>
<a href="<?php echo URLROOT; ?>/author/addwiki"
    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 fixed bottom-4 right-4">Add wiki</a>
<?php

require APPROOT . '/views/author/footer.php';

?>