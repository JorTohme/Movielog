<?php

class User extends DB
{
    private $email;
    private $password;

    public function userExists($userEmail, $pass)
    {

        $query = $this->connect()->prepare('SELECT FROM users WHERE email = :userEmail AND password = :pass');
        $query->execute(['userEmail' => $userEmail, 'pass' => $pass]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }


}
