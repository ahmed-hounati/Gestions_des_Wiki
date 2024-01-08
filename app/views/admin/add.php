<?php
require APPROOT . '/views/inc/header.php'; ?>
<div class="bg-white p-8 rounded-lg mt-28 shadow-md w-full md:w-96 mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Add Categorie</h1>
    <form action="<?php echo URLROOT; ?>/admin/add" method="post">
        <div class="mb-4">
            <label for="category_name" class="block text-gray-600">Categorie name :</label>
            <input type="text" id="category_name" name="category_name"
                class="border rounded w-full py-2 px-3 focus:outline-none focus:ring focus:border-blue-300">
            <span class="invalid-feedback">
            </span>
        </div>
        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Add</button>
        </div>
    </form>
</div>