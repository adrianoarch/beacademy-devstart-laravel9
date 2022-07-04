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

    public function edit($id)
    {
        if(!$user = $this->model->find($id)) 
            return redirect()->route('users.index');
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if(!$user = $this->model->find($id)) 
            return redirect()->route('users.index');
        $data = $request->only('name', 'email');
        if($request->has('password'))
            $data['password'] = bcrypt($request->password);

        $user->update($data);
        return redirect()->route('users.index');

        //$2y$10$0QeUh8TPYox5d4UhCEZ/fur7sufKs/y0dcrs1EnUSWY.RM2u.DPlq
        //$2y$10$1ckn3mWtfRtQ1wXy5DDPI.T.U9Iw6FfewiwGV9Vj71cbQzaTffGf6
    }

}