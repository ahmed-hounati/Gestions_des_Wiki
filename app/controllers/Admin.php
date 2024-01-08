<?php
class Admin extends Controller
{
    private $currentModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->currentModel = $this->model('Admins');
    }

    public function dashboard()
    {
        $data = [];
        $this->view('admin/dashboard', $data);
    }


}