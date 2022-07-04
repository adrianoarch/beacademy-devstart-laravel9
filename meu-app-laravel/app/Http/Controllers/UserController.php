<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Promise\Create;

class UserController extends Controller
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }
        

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // $user = User::findOrFail($id);
        if(!$user = User::find($id)) 
            return redirect()->route('users.index');
        
        $title = "Usuário #{$user->name}";

        return view('users.show', compact('user', 'title'));
    }

    public function create()
    {
        return view('users.create');
        // dd('Create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        return redirect()->route('users.index');
    }

}