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
            <h1 class="text-2xl font-semibold mb-4 md:mb-0">Home</h1>
            <div class="flex items-center space-x-4">
                <a href="" class="hover:text-gray-400">Category</a>
                <a href="<?php echo URLROOT; ?>/pages/wikies" class="hover:text-gray-400">Wikis</a>
                <a href="<?php echo URLROOT; ?>/users/login" class="hover:text-gray-400">Login</a>
                <a href="<?php echo URLROOT; ?>/users/register" class="hover:text-gray-400">Sign Up</a>
            </div>
        </div>
    </div>

    <?php foreach ($data['categories'] as $categorie): ?>
        <div class="container mx-auto mt-8 flex flex-wrap gap-4">
            <a href="<?php echo URLROOT; ?>/pages/" class="bg-gray-200 p-4 rounded shadow-md w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 mx-2">
                <h2 class="text-lg font-semibold mb-2">
                    <?php echo $categorie->category_name; ?>
                </h2>
            </a>
        </div>
    <?php endforeach; ?>

</body>

</html>