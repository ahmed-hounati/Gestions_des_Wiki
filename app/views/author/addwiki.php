<?php

require APPROOT . '/views/author/header.php';

?>
<div class="bg-white p-8 rounded-lg mt-28 shadow-md w-full md:w-96 mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Add Wiki</h1>
    <form action="<?php echo URLROOT; ?>/author/addwiki" method="post">
        <div class="mb-4">
            <label for="title" class="block text-gray-600">Wiki title :</label>
            <input type="text" id="title" name="title"
                class="border rounded w-full py-2 px-3 focus:outline-none focus:ring focus:border-blue-300">
            <span class="invalid-feedback">
            </span>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-600">Wiki content :</label>
            <input type="text" id="content" name="content"
                class="border rounded w-full py-2 px-3 focus:outline-none focus:ring focus:border-blue-300">
            <span class="invalid-feedback">
            </span>
        </div>
        <div class="mb-4">
            <label for="category" class="block text-gray-600">Category:</label>
            <select id="category" name="category_id" class="border rounded w-full sm:w-2/3 md:w-1/2 lg:w-1/3 xl:w-1/4 py-2 px-3 focus:outline-none focus:ring
                focus:border-blue-300">
                <?php foreach ($data['categories'] as $category): ?>
                    <option value="<?php echo $category->category_id; ?>">
                        <?php echo $category->category_name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="w-full">
            <label class="block text-lg font-semibold mb-2 text-black" for="grid-state-tags">
                Choose Your Tags
            </label>
            <div class="relative">
                <select name="tagname"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state-tags">
                    <option value="">Sélectionnez un tag</option>
                    <?php foreach ($data['tags'] as $tag): ?>
                        <option value="<?= $tag->id_tag; ?>">
                            <?= $tag->name_tag; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <input type="hidden" id="selected_tag_id" name="selected_tag_id" value="">
        <div id="selected-tag-names"></div>
        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Add Wiki</button>
        </div>
    </form>
</div>

<?php

require APPROOT . '/views/author/footer.php';

?>