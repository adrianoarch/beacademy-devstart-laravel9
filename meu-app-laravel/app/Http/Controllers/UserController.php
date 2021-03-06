<?php

namespace App\Http\Controllers;

use App\Exceptions\UserControllerException;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\Team;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        $users = $this->model->getUsers($request
        ->get('search'));

        // $teams = Team::with('users')->get();

        // return $teams;
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        // if (!$user = User::findOrFail($id)) {
        //     return redirect()->route('users.index');
        // }

        // $user->load('teams');

        $title = "Usuário #{$user->name}";

        if($user) {
            return view('users.show', compact('user', 'title'));
        }
        else {
            throw new UserControllerException("Usuário não encontrado");
        }

        // return $user;
        // return view('users.show', compact('user', 'title'));
    }

    public function create()
    {
        return view('users.create');
        // dd('Create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        if ($request->image) {
            $data['image'] = $request->file('image')
                ->store('profiles', 'public');
        }

        $this->model->create($data);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit($id)
    {
        if (!$user = $this->model->find($id)) {
            return redirect()->route('users.index');
        }

        return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if (!$user = $this->model->find($id)) {
            return redirect()->route('users.index');
        }

        $data = $request->only('name', 'email');
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('profiles', 'public');
        }

        $data['is_admin'] = $request->admin;

        $user->update($data);
        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        if (!$user = $this->model->find($id)) {
            return redirect()->route('users.index');
        }

        $user->delete();
        // return redirect()->route('users.index');
        return redirect()->route('users.index')->with('error', 'Usuário deletado com sucesso!');
    }

    public function admin()
    {
        return view('admin.index');
    }

}
