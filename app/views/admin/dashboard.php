<?php require APPROOT . '/views/admin/header.php';
?>

<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Total Wikis</h2>
        <p class="text-gray-700">
            <?php echo $data['totalWikis']->totalWikis; ?>
        </p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Most Prolific Author</h2>
        <p class="text-gray-700">
            <?php echo $data['mostProlificAuthor']->username; ?>
        </p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Total Tags</h2>
        <p class="text-gray-700">
            <?php echo $data['totalTags']->totalTags; ?>
        </p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Total Authors</h2>
        <p class="text-gray-700">
            <?php echo $data['totalAuthors']->totalAuthors; ?>
        </p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Total Categories</h2>
        <p class="text-gray-700">
            <?php echo $data['totalCategories']->totalCategories; ?>
        </p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Most Used Category</h2>
        <p class="text-gray-700">
            <?php echo $data['mostUsedCategory']->category_name; ?>
        </p>
    </div>
</div>
</div>

<?php require APPROOT . '/views/admin/footer.php'; ?>