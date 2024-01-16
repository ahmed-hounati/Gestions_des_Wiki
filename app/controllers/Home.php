<?php
class Home extends Controller
{
    private $currentModel;

    public function __construct()
    {
        $this->currentModel = $this->model('Homes');
    }

    public function index()
    {
        $wikies = $this->currentModel->Wikies();
        $data = [
            'wikies' => $wikies
        ];
        $this->view('home/index', $data);
    }


    public function show($id)
    {
        $wiki = $this->currentModel->getWiki($id);
        $data = [
            'wiki' => $wiki,
        ];
        $this->view('home/show', $data);
    }


    public function search_wiki()
    {
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
            $wikis = $this->currentModel->found_wiki($input);
            foreach ($wikis as $wiki) {
                echo '
                <div id="wikis" class="max-w-2xl mx-auto mt-4 mb-4 px-4 py-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="flex items-center justify-between">
                <span class="text-sm font-light text-gray-600 dark:text-gray-400">
                    ' . $wiki->creation_date . '
                </span>
                <span class="text-sm font-light text-gray-600 dark:text-gray-400">
                    ' . $wiki->category . '
                </span>';

                if (is_array($wiki->tags) || (is_string($wiki->tags) && !empty($wiki->tags))) {
                    $tags = is_array($wiki->tags) ? $wiki->tags : explode(', ', $wiki->tags);
                    foreach ($tags as $tag) {
                        echo '
                <div class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-300 transform bg-gray-600 rounded hover:bg-gray-500">
                    ' . trim($tag) . '
                </div>';
                    }
                }

                echo '
                </div>

                <div class="mt-2">
                <p class="text-xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline">
                    ' . $wiki->title . '
                </p>
                </div>

                <div class="flex items-center justify-between mt-4">
                <a href="' . URLROOT . '/home/show/' . $wiki->wiki_id . '" class="text-blue-600 dark:text-blue-400 hover:underline">Read more</a>
                <div class="flex items-center">
                <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200"></a>
                </div>
                </div>
                </div>';
            }
        }
    }
}