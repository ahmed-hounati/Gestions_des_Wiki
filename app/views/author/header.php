<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
    <style>
        .selected_tags {
            background-color: red;
            color: white;
            padding: 3px 10px;
        }
    </style>
</head>

<body class="bg-gray-200">

    <div class="bg-indigo-800 text-white p-4">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <h1 class="text-2xl font-semibold mb-4 md:mb-0">WIKI</h1>
            <div class="flex items-center gap-4 space-x-4">
                <a href="<?php echo URLROOT; ?>/author" class="hover:text-gray-400">Wikis</a>
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