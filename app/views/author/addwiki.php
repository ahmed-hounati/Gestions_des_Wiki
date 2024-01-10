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
        <div class="mb-4">
            <label for="tag" class="block text-gray-600">Tag:</label>
            <select id="id_tag" name="id_tag" class="border rounded w-full sm:w-2/3 md:w-1/2 lg:w-1/3 xl:w-1/4 py-2 px-3 focus:outline-none focus:ring
                focus:border-blue-300">
                <?php foreach ($data['tags'] as $tag): ?>
                    <option value="<?php echo $tag->id_tag; ?>">
                        <?php echo $tag->name_tag; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>



        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Add Wiki</button>
        </div>
    </form>
</div>