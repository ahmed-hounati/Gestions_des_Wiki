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
                <a href="#" class="hover:text-gray-400">Wikis</a>
                <a href="<?php echo URLROOT; ?>/users/login" class="hover:text-gray-400">Login</a>
                <a href="<?php echo URLROOT; ?>/users/register" class="hover:text-gray-400">Sign Up</a>
            </div>
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
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>