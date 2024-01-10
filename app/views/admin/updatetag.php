<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="bg-white p-8 rounded-lg mt-28 shadow-md w-80 md:w-96 mx-auto ">
    <h1 class="text-2xl font-semibold mb-4">Update Tag</h1>
    <form action="<?php echo URLROOT; ?>/admin/updatetag/<?php echo $data['id_tag']; ?>" method="post">
        <div class="mb-4">
            <label for="name_tag" class="block text-gray-600">Category name:</label>
            <input type="text" id="name_tag" name="name_tag"
                class="border rounded w-full py-2 px-3 focus:outline-none focus:ring focus:border-blue-300 <?php echo (!empty($data['name_tag_err'])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $data['name_tag'] ?>">
            <span class="invalid-feedback">
                <?php echo $data['name_tag_err']; ?>
            </span>
        </div>
        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update</button>
        </div>
    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>