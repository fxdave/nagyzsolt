<?php

class RegisterController {
    private $registerService;

    public function __construct($registerService) {
        $this->registerService = $registerService;
    }

    public function show() {
        include('./view/register.php');
    }

    public function register($post) {
        $success = $this->registerService->register($post['email'], $post['password']);
        include('./view/register.php');
    }
}