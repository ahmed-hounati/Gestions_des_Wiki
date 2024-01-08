<?php require APPROOT . '/views/inc/header.php'; ?>

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
                <a href="" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Archive</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>

</html>