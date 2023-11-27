<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Support\Facades\Hash;

class AdminCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersLawyers = User::where('role', 'lawyer')->get();
        $usersNoLawyers = User::where('role', 'no-lawyer')->get();
        $posts = Post::all()->take(10)->sortByDesc('created_at');
        return view('admin.index', [
            'usersLawyers' => $usersLawyers,
            'usersNoLawyers' => $usersNoLawyers,
            'posts' => $posts,
           
            ]);
    }

    public function usersIndex(){
        $usersAdmin = User::where('role', 'admin')->get();
        $usersLawyers = User::where('role', 'lawyer')->get();
        $usersNoLawyers = User::where('role', 'no-lawyer')->get();
        return view('admin.users.index', [
            'usersAdmin' => $usersAdmin,
            'usersLawyers' => $usersLawyers,
            'usersNoLawyers' => $usersNoLawyers,
        ]);
    }

    public function PendingRequestToLawyer(){
        return view('admin.solicitudesProceso');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
    }
    
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'El nombre no puede tener más de 255 caracteres',
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'Debe ser una dirección de correo electrónico válida',
            'email.unique' => 'El correo electrónico ya está en uso',
            'dni.required' => 'El DNI es requerido',
            'dni.numeric' => 'El DNI debe ser numérico',
            'dni.unique' => 'El DNI ya está en uso',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        ];

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'dni' => 'required|numeric|unique:user_data',
            'password' => 'required|min:8',
        ], $messages);

        $userData = UserData::create([
            'dni'=>$request->input('dni'),
        ]);

        User::create([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'email_verified_at'=> now(),
            'remember_token' => null,
            'password'=> Hash::make($request ->input('password')),
            'role'=>'admin',
            'user_data_id'=>$userData->id,
        ]);

        return redirect('admin/users');        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
