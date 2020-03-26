<?php

include_once("./controller/LoginController.php");
include_once("./controller/RegisterController.php");
include_once("./controller/HomeController.php");
include_once("./model/User.php");
include_once("./repository/UserRepository.php");
include_once("./service/LoginService.php");
include_once("./service/RegisterService.php");
include_once("./service/HashService.php");

// session
session_start();

// db
$db = new mysqli('db', 'user', 'user', 'login');

if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '. $db->connect_error);
}

// service
$hashService = new HashService();
$userRepository = new UserRepository($db);
$loginService = new LoginService($userRepository, $hashService);
$registerService = new RegisterService($userRepository, $hashService);

// controllers
$loginController = new LoginController($loginService);
$registerController = new RegisterController($registerService);
$homeController = new HomeController();

if(isset($_POST['login'])) {
    $loginController->login($_POST);
} elseif(isset($_POST['registration'])) {
    $registerController->register($_POST);
} elseif (isset($_GET['page']) && $_GET['page'] == 'login') {
    $loginController->show();
} elseif (isset($_GET['page']) && $_GET['page'] == 'logout') {
    $loginController->logout();
} elseif (isset($_GET['page']) && $_GET['page'] == 'register') {
    $registerController->show();
} else {
    $homeController->show();
}