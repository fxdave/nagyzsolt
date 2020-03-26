<?php

class HashService {
    public function getHash($pass, $salt) {
        return hash_hmac('sha256', $salt, $pass);
    }

    public function generateSalt($length = 50) {
        $abc = "0123456789qwertzuiopasdfghjklyxcvbnm";

        $salt = "";
        for($i=0; $i<$length; $i++) {
            $salt .= $abc[rand(0,strlen($abc)-1)];
        }

        return $salt;
    }
}