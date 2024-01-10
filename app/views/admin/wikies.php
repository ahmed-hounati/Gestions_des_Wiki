<?php require APPROOT . '/views/inc/header.php'; ?>

<?php foreach ($data['wikies'] as $wiki): ?>
    <div class="max-w-2xl mx-auto mt-4 px-4 py-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex items-center justify-between">
            <span class="text-sm font-light text-gray-600 dark:text-gray-400">
                <?php echo $wiki->creation_date; ?>
            </span>
            <span class="text-sm font-light text-gray-600 dark:text-gray-400">
                <?php echo $wiki->category_name; ?>
            </span>
            <a class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-300 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500"
                tabindex="0" role="button"><?php echo $wiki->name_tag; ?></a>
        </div>

        <div class="mt-2">
            <p
                class="text-xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">
                <?php echo $wiki->title; ?>
            </p>
            <p class="mt-2 text-gray-600 dark:text-gray-300">
                <?php echo $wiki->content; ?>
            </p>
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline" tabindex="0" role="link">Read more</a>

            <div class="flex items-center">
                <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200" tabindex="0" role="link"></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</div>

</body>

</html>