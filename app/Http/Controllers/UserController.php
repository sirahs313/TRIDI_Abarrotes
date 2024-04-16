<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function home(){
        return view('principal');
    }
    
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|string|min:6', // Campo de contraseña opcional
        ]);
    
        $userData = $request->only(['name', 'email']);
        // Si se proporciona una contraseña, agrégala a los datos del usuario
        if ($request->filled('password')) {
            $userData['password'] = bcrypt($request->password);
        }
    
        User::create($userData);
    
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
