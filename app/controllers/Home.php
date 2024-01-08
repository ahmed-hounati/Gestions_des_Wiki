<?php
class Home extends Controller
{
    private $currentModel;

    public function __construct()
    {
        $this->currentModel = $this->model('Categories');
    }

    public function index()
    {
        $categories = $this->currentModel->getCategories();
        $data = [
            'categories' => $categories
        ];
        $this->view('pages/index', $data);
    }

    public function wikies()
    {
        $wikies = $this->currentModel->getWikies();
        $data = [
            'wikies' => $wikies
        ];
        $this->view('pages/wikies', $data);
    }

}