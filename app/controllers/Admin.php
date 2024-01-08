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
        $categories = $this->currentModel->getCategories();
        $data = [
            'categories' => $categories
        ];
        $this->view('admin/dashboard', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'category_name' => trim($_POST['category_name'])
            ];

            if (!empty($data['category_name'])) {
                if ($this->currentModel->addCategories($data)) {
                    redirect('admin/dashboard');
                } else {
                    die('Something wrong');
                }
            } else {
                $this->view('admin/add', $data);
            }
        } else {
            $data = [
                'category_name' => '',
            ];

            $this->view('admin/add', $data);
        }
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'category_id' => $id,
                'category_name' => trim($_POST['category_name']),
            ];


            if (!empty($data['category_name'])) {
                $this->currentModel->updateCategorie($data);
                redirect('admin/dashboard');
            }
        } else {
            $category = $this->currentModel->getCategoryById($id);

            $data = [
                'category_id' => $category->category_id,
                'category_name' => $category->category_name,
            ];

            $this->view('admin/update', $data);
        }
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $this->currentModel->deleteCategory($id);
            redirect('admin/dashboard');
        } else {
            redirect('admin/dashboard');
        }
    }

    public function wikies()
    {
        $wikies = $this->currentModel->getWikies();
        $data = [
            'wikies' => $wikies
        ];
        $this->view('admin/wikies', $data);
    }

}