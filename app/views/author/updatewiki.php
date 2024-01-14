<?php require APPROOT . '/views/author/header.php'; ?>
<div class="bg-white p-8 rounded-lg shadow-md w-full md:w-96 mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Update Wiki</h1>
    <form action="<?php echo URLROOT; ?>/author/updatewiki/<?php echo $data['wiki_id']; ?>" method="post">
        <div class="mb-4">
            <label for="title" class="block text-gray-600">Wiki title :</label>
            <input type="text" id="title" name="title"
                class="border rounded w-full py-2 px-3 focus:outline-none focus:ring focus:border-blue-300"
                value="<?php echo $data['title']; ?>">
            <span class="invalid-feedback">
            </span>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-600">Wiki content :</label>
            <input type="text" id="content" name="content"
                class="border rounded w-full py-2 px-3 focus:outline-none focus:ring focus:border-blue-300"
                value="<?php echo $data['content']; ?>">
            <span class="invalid-feedback">
            </span>
        </div>
        <div class="mb-4">
            <label for="category" class="block text-gray-600">Category:</label>
            <select id="category" name="category_id" class="border rounded w-full sm:w-2/3 md:w-1/2 lg:w-1/3 xl:w-1/4 py-2 px-3 focus:outline-none focus:ring
                focus:border-blue-300 value=" <?php echo $data['categories']->category_name; ?>"">
                <?php foreach ($data['categories'] as $category): ?>
                    <option value="<?php echo $category->category_id; ?>">
                        <?php echo $category->category_name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="w-full">
            <label class="block text-lg font-semibold mb-2 text-black" for="grid-state-tags">
                Choose Your Tags
            </label>
            <div class="relative m-4">
                <select name="tagname"
                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state-tags">
                    <option value="">Select a tag</option>
                    <?php foreach ($data['tags'] as $tag): ?>
                        <option value="<?= $tag->id_tag; ?>">
                            <?= $tag->name_tag; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <input type="hidden" id="selected_tag_id" name="selected_tag_id" value="">
        <div id="selected-tag-names"></div>
        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <button class="bg-blue-500 text-white m-4 py-2 px-4 rounded hover:bg-blue-600">Update</button>
        </div>
    </form>
</div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var selectedTagIds = [];
        <?php

        foreach ($data['selectedTags'] as $selectedTag) { ?>
            selectedTagIds.push(JSON.stringify(<?php echo ($selectedTag->id_tag); ?>))
            updateDisplayedTags()
        <?php } ?>

        function updateDisplayedTags() {
            var tagsContainer = document.getElementById("selected-tag-names");
            var selectedTagIdInput = document.getElementById("selected_tag_id");
            tagsContainer.innerHTML = "";

            selectedTagIds.forEach(function (tagId) {
                var tagName = getTagNameById(tagId);
                var tag = document.createElement("span");
                tag.className = "selected-tag";
                tag.innerHTML = "<span class='bg-blue-500 text-white p-1 rounded-md m-1'>" + tagName + "</span><button class='text-red-500' data-tag-id=\"" + tagId + "\">Remove</button>";
                tagsContainer.appendChild(tag);

                var removeButton = tag.querySelector("button");
                removeButton.addEventListener("click", removeTag);
            });


            selectedTagIdInput.value = JSON.stringify(selectedTagIds);
        }

        function getTagNameById(tagId) {
            var tag = <?php echo json_encode($data['tags']); ?>;
            for (var i = 0; i < tag.length; i++) {
                if (tag[i].id_tag == tagId) {
                    return tag[i].name_tag;
                }
            }
            return "";
        }

        function removeTag(event) {
            var tagId = event.target.dataset.tagId;
            var index = selectedTagIds.indexOf(tagId);
            if (index !== -1) {
                selectedTagIds.splice(index, 1);
                updateDisplayedTags();
            }
        }

        var selectElement = document.getElementById("grid-state-tags");
        selectElement.addEventListener("change", function () {
            var selectedTagId = selectElement.value;
            if (selectedTagId && !selectedTagIds.includes(selectedTagId)) {
                selectedTagIds.push(selectedTagId);
                updateDisplayedTags();
            }
        });
    });

</script>

<?php require APPROOT . '/views/author/footer.php'; ?>