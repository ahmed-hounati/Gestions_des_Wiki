<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Dashboard</title>
</head>

<body class="bg-gray-200">

    <div class="bg-indigo-800 text-white p-4">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <h1 class="text-2xl font-semibold mb-4 md:mb-0">WIKI</h1>
            <div class="flex items-center gap-4 space-x-4">
                <a href="<?php echo URLROOT; ?>/author/dashboard" class="hover:text-gray-400">Category</a>
                <a href="<?php echo URLROOT; ?>/author/wikies" class="hover:text-gray-400">Wikis</a>
                <a href="<?php echo URLROOT; ?>/users/logout" class="hover:text-gray-400">Logout</a>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4">
        <div class="flex items-center">
            <input type="search" name="search" placeholder="Search"
                class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none w-full">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 ml-2 rounded hover:bg-blue-600">
                Search
            </button>
        </div>
    </div>

    <div class="container mx-auto mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php foreach ($data['wikies'] as $wiki): ?>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-2">
                    <?php echo $wiki->title; ?>
                </h2>
                <p class="text-gray-600">
                    <?php echo $wiki->creation_date; ?>
                </p>
                <p class="text-gray-600">
                    <?php echo $wiki->content; ?>
                </p>
                <div class="mt-4">
                    <a href="#" class="text-blue-500">Read More</a>
                </div>
                <div class="flex justify-between mt-4">
                    <a href="<?php echo URLROOT; ?>/author/updatewiki/<?php echo $wiki->wiki_id; ?>" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">update</a>
                    <a href="<?php echo URLROOT; ?>/author/deletewiki/<?php echo $wiki->wiki_id; ?>" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-blue-600">delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="<?php echo URLROOT; ?>/author/addwiki"
        class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 fixed bottom-4 right-4">Add wiki</a>

</body>

</html>