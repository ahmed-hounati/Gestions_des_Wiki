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
                <a href="<?php echo URLROOT; ?>/home" class="hover:text-gray-400">Wikis</a>
                <a href="<?php echo URLROOT; ?>/users" class="hover:text-gray-400">Login</a>
                <a href="<?php echo URLROOT; ?>/users/register" class="hover:text-gray-400">Sign Up</a>
            </div>
        </div>
    </div>