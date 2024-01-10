<?php
class Admin extends Controller
{
    private $currentModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        if (($_SESSION['role'] !== 'admin')) {
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
                'category_name' => trim($_POST['category_name']),
                'category_name_err' => '',
            ];

            if (empty($data['category_name'])) {
                $data['category_name_err'] = 'Please enter ur category';
            } else {
                if ($this->currentModel->findCategoryByName($data)) {
                    $data['category_name_err'] = 'Category is already found';
                    $this->view('admin/add', $data);
                } else {
                    $this->currentModel->addCategories($data);
                    redirect('admin/dashboard');
                }
            }
        } else {
            $data = [
                'category_name' => '',
                'category_name_err' => '',
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
                'category_name_err' => '',
            ];


            if (empty($data['category_name'])) {
                $data['category_name_err'] = 'Please enter ur category';
            } else {
                if ($this->currentModel->findCategoryByName($data)) {
                    $data['category_name_err'] = 'Category is already found';
                    $this->view('admin/update', $data);
                } else {
                    $this->currentModel->updateCategorie($data);
                    redirect('admin/dashboard');
                }
            }
        } else {
            $category = $this->currentModel->getCategoryById($id);

            $data = [
                'category_id' => $category->category_id,
                'category_name' => $category->category_name,
                'category_name_err' => '',
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

    public function tags()
    {
        $tags = $this->currentModel->getTags();
        $data = [
            'tags' => $tags,
            'tag_err' => '',
        ];
        $this->view('admin/tags', $data);
    }

    public function addtag()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name_tag' => trim($_POST['name_tag']),
                'name_tag_err' => '',
            ];

            if (empty($data['name_tag'])) {
                $data['name_tag_err'] = 'Please enter ur tag';
            } else {
                if ($this->currentModel->findTagByName($data)) {
                    $data['name_tag_err'] = 'Tag is already found';
                    $this->view('admin/addtag', $data);
                } else {
                    $this->currentModel->addTag($data);
                    redirect('admin/tags');
                }
            }


        } else {
            $data = [
                'name_tag' => '',
                'name_tag_err' => '',
            ];

            $this->view('admin/addtag', $data);
        }
    }

    public function updatetag($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id_tag' => $id,
                'name_tag' => trim($_POST['name_tag']),
                'name_tag_err' => '',
            ];

            if (empty($data['name_tag'])) {
                $data['name_tag_err'] = 'Please enter ur tag';
            } else {
                if ($this->currentModel->findTagByName($data)) {
                    $data['name_tag_err'] = 'Tag is already found';
                    $this->view('admin/updatetag', $data);
                } else {
                    $this->currentModel->updateTag($data);
                    redirect('admin/tags');
                }
            }
        } else {
            $tags = $this->currentModel->getTagById($id);
            $data = [
                'id_tag' => $tags->id_tag,
                'name_tag' => $tags->name_tag,
                'name_tag_err' => '',
            ];

            $this->view('admin/updatetag', $data);
        }
    }

    public function deletetag($id)
    {
        if (!empty($id)) {
            $this->currentModel->deleteTag($id);
            redirect('admin/tags');
        } else {
            redirect('admin/tags');
        }
    }

}