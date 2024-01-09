<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container mx-auto mt-8 flex flex-wrap gap-4">
    <?php foreach ($data['tags'] as $tag): ?>
        <div class="bg-white p-4 rounded shadow-md w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 mx-2">
            <h2 class="text-lg font-semibold mb-2">
                <?php echo $tag->name_tag; ?>
            </h2>
            <div class="flex justify-between mt-4">
                <a href="<?php echo URLROOT; ?>/admin/updatetag/<?php echo $tag->id_tag; ?>"
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update</a>
                <a href="<?php echo URLROOT; ?>/admin/deletetag/<?php echo $tag->id_tag; ?>"
                    class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<a href="<?php echo URLROOT; ?>/admin/addtag"
    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 fixed bottom-4 right-4">Add Tag</a>

</body>

</html>