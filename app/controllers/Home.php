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
        $wikies = $this->currentModel->getWikies();
        $data = [
            'wikies' => $wikies
        ];
        $this->view('pages', $data);
    }

}