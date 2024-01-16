<?php require APPROOT . '/views/admin/header.php'; ?>

<div id="search_result"></div>
<div id="wikis" class="">
    <?php foreach ($data['wikies'] as $wiki): ?>
        <div class="max-w-2xl mx-auto mt-4 mb-4 px-4 py-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <span class="text-sm font-light text-gray-600 dark:text-gray-400">
                    <?php echo $wiki->creation_date; ?>
                </span>
                <span class="text-sm font-light text-gray-600 dark:text-gray-400">
                    <?php echo $wiki->category_name; ?>
                </span>
                <?php if (is_array($wiki->tags) || (is_string($wiki->tags) && !empty($wiki->tags))):
                    $tags = is_array($wiki->tags) ? $wiki->tags : explode(',', $wiki->tags);
                    foreach ($tags as $tag):
                        ?>
                        <div
                            class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-300 transform bg-gray-600 rounded hover:bg-gray-500">
                            <?php echo trim($tag); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>

            <div class="mt-2">
                <p
                    class="text-xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">
                    <?php echo $wiki->title; ?>
                </p>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a href="<?php echo URLROOT; ?>/author/show/<?php echo $wiki->wiki_id ?>"
                    class="text-blue-600 dark:text-blue-400 hover:underline">Read
                    more</a>
                <div class="flex items-center">
                    <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200"></a>
                </div>
            </div>
            <div class="flex items-center justify-between mt-4">
                <div class="flex">
                    <a href="<?php echo URLROOT; ?>/admin/archive/<?php echo $wiki->wiki_id; ?>"
                        class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"><i
                            class="fa-solid fa-box-archive fa-xl"></i></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<a href="<?php echo URLROOT; ?>/author/addwiki"
    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 fixed bottom-4 right-4"><i
        class="fa-solid fa-plus fa-xl"></i></a>
</body>

<script>
    $("#default-search").keyup(function () {
        var input = $(this).val();

        if (input != "") {
            // alert(input);
            const fetchUrl = "<?php echo URLROOT . '/home/search_wiki'; ?>";
            $.ajax({
                url: fetchUrl,
                method: "POST",
                data: {
                    input: input
                },
                // dataType: 'json',
                success: function (tasks) {
                    console.log(tasks);
                    $("#search_result").html(tasks);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching tasks:', status, error);
                }
            });
            $("#wikis").hide();
            $("#search_result").show()
        } else {
            $("#wikis").show();
            $("#search_result").hide()
        }

    })
</script>

<?php require APPROOT . '/views/admin/footer.php'; ?>