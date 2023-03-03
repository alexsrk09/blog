<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class IndexController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = User::where('name', $username)->first();
            if ($user) {
                if (password_verify($password, $user->password)) {
                    $_SESSION['user'] = $user;
                    return view('welcome');
                }
                else {
                    echo "Wrong password";
                    return view('welcome');
                }
            }
            else {
                echo "User not found";
                return view('welcome');
            }
        }
    }
    public function register()
    {
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['email'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $email = $_POST['email'];
            if ($password == $password2) {
                $user = User::where('name', $username)->first();
                if ($user) {
                    echo "User already exists";
                    return view('welcome');
                }
                else {
                    $user = new User;
                    $user->name = $username;
                    $user->password = password_hash($password, PASSWORD_DEFAULT);
                    $user->email = $email;
                    $user->save();
                    $_SESSION['user'] = $user;
                    return view('welcome');
                }
            }
            else {
                echo "Passwords don't match";
                return view('welcome');
            }
        }
    }
}