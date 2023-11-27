<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function signin(Request $request)
    {
        $messages = [
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser válido',
            'password.required' => 'La contraseña es requerida',
        ];

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], $messages);
        
        $user = User::where('email', $request->input('email'))
            // ->where('role','lawyer')
            // ->orWhere('role','no-lawyer')
            ->first();

        Auth::login($user);

        if($user->role == 'admin'){
            return redirect('admin');
        }

        return redirect('dashboard');
    }

    public function logout(){
    Auth::logout();
    return redirect ('/login');
} 

    public function register(Request $request) {

        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'El nombre no puede tener más de 255 caracteres',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser válido',
            'email.unique' => 'El email ya está registrado',
            'dni.required' => 'El DNI es requerido',
            'dni.max' => 'El DNI no puede tener más de 10 caracteres',
            'avatar.required' => 'La imagen es requerida',
            'password.required' => 'La contraseña es requerida',
            'password.max' => 'La contraseña no puede tener más de 255 caracteres',
        ];

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'dni' => 'required|max:10',
            'avatar' => 'required',
            'password' => 'required|max:255',
        ], $messages);


        $file = $request->file('avatar')->store('public/avatars');    
        
        $userData = UserData::create([
            'dni'=>$request->input('dni'),'avatar'=>$file
        ]);

    $user = User::create ([
        'name'=> $request->input('name'),
        'email'=> $request->input('email'),
        'email_verified_at'=> now(),
        'remember_token' => null,
        'password'=> Hash::make($request ->input('password')),
        'role'=>'no-lawyer',
        'user_data_id'=>$userData->id,
    ]);
    //$user -> userData = ['dni'=>$request->input('dni'),'avatar'=>$request->input('avatar')];
    //$user->save();
    return redirect('login');
}

    public function formRegister() {
        return view('register');
    }



}
