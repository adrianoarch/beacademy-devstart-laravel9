<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@email.com',
        ];
       
        dd($users);
    }

    public function show($id)
    {
        $user = [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'johndoe@email.com',
                ];

            dd("O usuário {$user['name']} é o usuário {$id}");
    }
}