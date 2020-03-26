<?php

class RegisterService {
    private $userRepository;
    private $hashService;

    public function __construct($userRepository, $hashService) {
        $this->userRepository = $userRepository;
        $this->hashService = $hashService;
    }

    public function register($email, $pass) {
        $level = 1;
        $salt = $this->hashService->generateSalt();
        $hash = $this->hashService->getHash($pass, $salt);
        return $this->userRepository->create($email, $hash, $salt, $level);
    }
}