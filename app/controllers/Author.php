<?php
class Author extends Controller
{
    private $currentModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->currentModel = $this->model('Authors');
    }

    public function dashboard()
    {
        $data = [];
        $this->view('author/dashboard', $data);
    }


}