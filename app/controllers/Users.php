<?php

class Users extends Controller
{

    private $currentModel;

    public function __construct()
    {
        $this->currentModel = $this->model('User');
    }
    public function index()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter ur email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter ur password';
            }


            if ($this->currentModel->findUserEmail($data['email'])) {
            } else {
                $data['email_err'] = 'no user found';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                $loggedInUser = $this->currentModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'password incorrect';

                    $this->view('users/index', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/index', $data);
            }
        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/index', $data);
        }
    }

    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // Init data
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter ur email';
            } else {
                // Check email
                if ($this->currentModel->findUserEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Validate Name
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter ur name';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Pleae enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['username_err']) && empty($data['password_err'])) {
                // Validated
                //hach
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->currentModel->register($data)) {
                    redirect('users/login');
                } else {
                    die('soothing wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }
        } else {
            // Init data
            $data = [
                'username' => '',
                'email' => '',
                'password' => '',
                'username_err' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }




    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['email'] = $user->email;
        $_SESSION['role'] = $user->role;

        $role = $_SESSION['role'];

        switch ($role) {
            case 'admin':
                $redirectUrl = 'admin';
                break;
            case 'author':
                $redirectUrl = 'author';
                break;
            default:
                $redirectUrl = 'pages';
                break;
        }

        redirect($redirectUrl);

    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['role']);
        session_destroy();
        redirect('users/login');
    }
}
