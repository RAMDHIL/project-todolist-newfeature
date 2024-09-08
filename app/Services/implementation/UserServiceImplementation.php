<?php
namespace App\Services\Implementation;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserServiceImplementation implements UserService{
    
    function login(string $email,string $password):bool
    {
        return Auth::attempt(['email' => $email, 'password' => $password]);
    }
}
?>