</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var selectedTagIds = [];

        function updateDisplayedTags() {
            var tagsContainer = document.getElementById("selected-tag-names");
            var selectedTagIdInput = document.getElementById("selected_tag_id");
            tagsContainer.innerHTML = "";

            selectedTagIds.forEach(function (tagId) {
                var tagName = getTagNameById(tagId);
                // Fonction pour récupérer le nom du tag
                var tag = document.createElement("span");
                tag.className = "selected-tag";
                tag.innerHTML = "<span class='bg-blue-500 text-white p-1 rounded-md m-1'>" + tagName + "</span><button class='text-red-500' data-tag-id=\"" + tagId + "\">Remove</button>";
                tagsContainer.appendChild(tag);

                // Attach the click event to the Remove button
                var removeButton = tag.querySelector("button");
                removeButton.addEventListener("click", removeTag);
            });


            selectedTagIdInput.value = JSON.stringify(selectedTagIds);
        }

        function getTagNameById(tagId) {
            // Fonction pour récupérer le nom du tag à partir du tableau de données des tags
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

        // Event listener for the select element
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

</html>