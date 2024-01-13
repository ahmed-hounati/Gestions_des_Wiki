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


    public function search_wiki()
    {
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
            $wikis = $this->currentModel->found_wiki($input);
            foreach ($wikis as $wiki) {
                echo '
                    <section id="wikis" class="text-blueGray-700 bg-white ">
                        <div class="container flex flex-col items-center px-5 py-16 mx-auto md:flex-row md:justify-around ">
                            <div class="flex flex-col items-start mb-16 text-left  md:w-1/3  ">
                                <h1 class="mb-8 text-2xl font-black tracking-tighter text-black md:text-5xl title-font">' . $wiki->title . '</h1>
                                <p class="mb-8 text-base leading-relaxed text-left text-blueGray-600 max-h-[25vh] overflow-y-hidden ">' . $wiki->content . '</p>
                                <div class="flex flex-col justify-center lg:flex-row">
                                    <a href="' . URLROOT . '/author/read_more/' . $wiki->wiki_id . '" class="flex items-center px-6 py-2 mt-auto font-semibold text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-lg hover:bg-blue-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2"> Show me </a>
                                    <p class="mt-2 text-sm text-left text-blueGray-600 md:ml-6 md:mt-0"> It will take you to read more <br class="hidden lg:block">
                                        <a href="' . URLROOT . '/author/read_more/' . $wiki->wiki_id . '" class="inline-flex items-center font-semibold text-blue-600 md:mb-2 lg:mb-0 hover:text-black " title="read more"> Read more about it Â» </a>
                                    </p>
                                </div>
                                <div class="flex w-full mt-16  justify-around ">
                                    <a href="' . URLROOT . '/author/archiver_wiki/' . $wiki->wiki_id . '" class="p-2 bg-red-400  rounded cursor-pointer "><i class="fa-solid fa-box-archive "> ARCHIVER</i></a>
                                    <a href="' . URLROOT . '/author/update_wiki/' . $wiki->wiki_id . '" class="p-2 bg-green-400 rounded cursor-pointer "><i class="fa-regular fa-pen-to-square "> UPDATE</i></a>
                                </div>
                            </div>
                        </div>
                    </section>
                ';
            }
        }
    }

    public function show($id)
    {
        $wiki = $this->currentModel->getWiki($id);
        $data = [
            'wiki' => $wiki,
        ];
        $this->view('home/show', $data);
    }
}