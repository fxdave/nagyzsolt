<?php

class UserRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($email, $hash, $salt, $level) {
        $stmt = $this->db->prepare("INSERT INTO users (email, hash, salt, level) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $email, $hash, $salt, $level);
        $stmt->execute();

        return true;
    }

    public function getByEmail($email) {
        $stmt = $this->db->prepare("SELECT `id`,`email`,`hash`,`salt`,`level` FROM `users` WHERE `email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($id, $email, $hash, $salt, $level);
        $stmt->fetch();
        $stmt->close();
        return new User($id, $email, $hash, $salt, $level);
    }
}
