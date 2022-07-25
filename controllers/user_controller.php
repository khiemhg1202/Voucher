<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/user_model.php");

class UserController
{
    private $usermodel;

    public function __construct()
    {
        $this->usermodel = new UserModel();
        session_start();
    }

    public function userInvoke()
    {
        if (isset($_SESSION['user_id'])) {
            $this->clickLogout();
            $this->clickUpdate();
            include($_SERVER['DOCUMENT_ROOT'] . "/views/user_profile.php");
        } else {
            include($_SERVER['DOCUMENT_ROOT'] . "/views/login.php");
        }
    }

    public function checkLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    private function clickSignup()
    {
        if (isset($_POST['signup']) && $_POST['signup'] == "signup") {
            $this->usermodel->signup();
        }
    }

    private function clickLogin()
    {
        if (isset($_POST['login']) && $_POST['login'] == "login") {
            $this->usermodel->login();
        }
    }

    private function clickLogout()
    {
        if (isset($_GET['action']) && $_GET['action'] == "logout") {
            $this->usermodel->logout();
        }
    }

    private function clickUpdate()
    {
        if (isset($_POST['update'])) {
            $this->usermodel->updateUserInfo();
        }
    }
}