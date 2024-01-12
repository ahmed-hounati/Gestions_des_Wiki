<?php require APPROOT . '/views/admin/header.php'; ?>
<h1 class="text-3xl font-semibold mb-2 ml-32">Categories :</h1>
<div class="container mx-auto mt-8 flex flex-wrap gap-4">
    <?php foreach ($data['categories'] as $category): ?>
        <div class="bg-white p-4 rounded shadow-md w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 mx-2">
            <h2 class="text-lg font-semibold mb-2">
                <?php echo $category->category_name; ?>
            </h2>
            <div class="flex justify-between mt-4">
                <a href="<?php echo URLROOT; ?>/admin/update/<?php echo $category->category_id; ?>"
                    class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600"><i
                        class="fa-solid fa-pen-clip fa-xl"></i></a>
                <a href="<?php echo URLROOT; ?>/admin/delete/<?php echo $category->category_id; ?>"
                    class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600"><i
                        class="fa-solid fa-trash fa-xl"></i></a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<a href="<?php echo URLROOT; ?>/admin/add"
    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 fixed bottom-4 right-4"><i
        class="fa-solid fa-plus fa-xl"></i></a>



</body>

</html>