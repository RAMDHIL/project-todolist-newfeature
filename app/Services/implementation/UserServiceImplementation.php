<?php
namespace App\Services\Implementation;
use App\Services\UserService;

class UserServiceImplementation implements UserService{
    private $users = [
        'fadhilah' => 'ramadhan'
    ];
    function login(string $username,string $password):bool{
        if (!isset($this->users[$username])) {
            return false;
        }
        $correct_password = $this->users[$username];
        return $correct_password == $password;
    }
}
?>