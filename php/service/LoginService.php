<?php

class LoginService {
    private $userRepository;
    private $hashService;
    public function __construct($userRepository, $hashService) {
        $this->userRepository = $userRepository;
        $this->hashService = $hashService;
    }

    public function login($email, $pass) {
        $user = $this->userRepository->getByEmail($email);
        $hash = $this->hashService->getHash($pass, $user->getSalt());
        if($hash == $user->getHash()) {
            $_SESSION["user_id"] = $user->getId();
            $_SESSION["user_hash"] = $user->gethash();
            $_SESSION["user_email"] = $user->getEmail();
            $_SESSION["user_level"] = $user->getLevel();
        }
    }

    public function logout() {
        unset($_SESSION["user_id"]);
        unset($_SESSION["user_hash"]);
        unset($_SESSION["user_email"]);
        unset($_SESSION["user_level"]);
    }
}
