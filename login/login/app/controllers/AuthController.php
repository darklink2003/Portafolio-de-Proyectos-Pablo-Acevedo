<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->userModel->login($email, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: index.php?page=dashboard');
                exit;
            } else {
                echo "<p>Credenciales inválidas.</p>";
            }
        }
        require_once __DIR__ . '/../views/login.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->userModel->register($username, $email, $password);
            header('Location: index.php?page=login');
            exit;
        }
        require_once __DIR__ . '/../views/register.php';
    }

    public function dashboard()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?page=login');
            exit;
        }
        require_once __DIR__ . '/../views/dashboard.php';
    }
    public function logout()
    {
        session_start();
        session_unset(); // elimina todas las variables de sesión
        session_destroy(); // destruye la sesión

        header('Location: /public/index.php'); // redirige al inicio de sesión u otra página
        exit();
    }

}
?>