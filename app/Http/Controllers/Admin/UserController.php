<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except(['show', 'edit', 'update']);
    }

    public function index()
    {
        $response['users'] = User::all();

        return view('admin.user.list.index', $response);
    }

    public function create()
    {
        return view('admin.user.create.index');
    }

    public function store(Request $request)
    {
        /* User::create($request->all()); */
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,editor,user'],
        ], [
            'password.confirmed' => 'As senhas não coincidem.',
            'email.unique' => 'Este e-mail já está em uso.',
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
            'role.required' => 'O papel do usuário é obrigatório.',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Cadastrado com sucesso!');
    }

    public function show($id)
    {
        $response['user'] = User::findOrFail($id);
        return view('admin.user.details.index', $response);
    }

    public function edit(User $user)
    {

        $response['user'] =  $user;
        return view('admin.user.edit.index', $response);
    }

    public function update(Request $request, User $user)
    {
        if(Auth::id() !== $user->id && !(Auth::user()->role === 'admin')) {
            return redirect()->route('admin.users.index')->with('error', 'You do not have permission to edit this user.');
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,  
        ]);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}