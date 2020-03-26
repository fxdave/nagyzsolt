<?php

class User {
    private $id;
    private $email;
    private $hash;
    private $salt;
    private $level;

    public function __construct($id, $email, $hash, $salt, $level) {
        $this->id = $id;
        $this->email = $email;
        $this->hash = $hash;
        $this->salt = $salt;
        $this->level = $level;
    }

    public function getId() {
        return $this->id;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getHash() {
        return $this->hash;
    }
    public function getSalt() {
        return $this->salt;
    }
    public function getLevel() {
        return $this->level;
    }
}
