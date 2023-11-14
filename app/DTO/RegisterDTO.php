<?php

namespace App\DTO;

class RegisterDTO {

    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $confirm_password;

    public function __construct($first_name, $last_name, $email, $password, $confirm_password)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
    }

}