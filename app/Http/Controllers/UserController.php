<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    function __construct(UserService $userService){
        $this->userService = $userService;
    }
    function login(){
        return response()->view('login',[
            'title' => 'page login',
            'year' => date('Y'),
        ]);
    }
    function doLogin(Request $request){
        $input_username = $request->input('username');
        $input_password = $request->input('password');
        if (empty($input_username) || empty($input_password)) {
            return response()->view('login',[
                'title' => 'page login',
                'error' => 'password or username is empty',
                'year' => date('Y')
            ]);
        }
        if ($this->userService->login($input_username,$input_password)) {
            $request->session()->put('username', $input_username);
            return redirect('/');
        }
        return response()->view('login',[
            'title' => 'page login',
            'error' => 'password or username is wrong',
            'year' => date('Y')
        ]);
    }

    function doLogout(Request $request){
        $request->session()->forget('username');
        return redirect('/');
    }
}
