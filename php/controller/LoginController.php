<?php

class LoginController {
    private $loginService;
    public function __construct($loginService) {
        $this->loginService = $loginService;
    }

    public function show() {
        include('./view/login.php');
    }

    public function login($post) {
        $this->loginService->login($post['email'], $post['password']);
        header('location: /');
    }

    public function logout() {
        $this->loginService->logout();
        header('location: /');
    }
}