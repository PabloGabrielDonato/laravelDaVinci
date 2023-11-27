<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lawyer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
        return redirect('login');
    }

    $user = User::find(Auth::getUser()->id);
    return view('lawyerCreate', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
        return redirect('login');
    }

    $messages = [
        'firstName.required' => 'El nombre es requerido',
        'firstName.max' => 'El nombre no puede tener más de 255 caracteres',
        'lastName.required' => 'El apellido es requerido',
        'lastName.max' => 'El apellido no puede tener más de 255 caracteres',
        'topic.required' => 'El tema es requerido',
        'topic.max' => 'El tema no puede tener más de 255 caracteres',
        'address.required' => 'La dirección es requerida',
        'address.max' => 'La dirección no puede tener más de 255 caracteres',
        'phone.required' => 'El teléfono es requerido',
        'phone.max' => 'El teléfono no puede tener más de 255 caracteres',
        'email.required' => 'El email es requerido',
        'email.max' => 'El email no puede tener más de 255 caracteres',
    ];

    $request->validate([
        'firstName' => 'required|max:255',
        'lastName' => 'required|max:255',
        'topic' => 'required|max:255',
        'address' => 'required|max:255',
        'phone' => 'required|max:255',
        'email' => 'required|max:255',
    ], $messages);

    $user = User::find(Auth::getUser()->id);
    $lawyer = Lawyer::create([
        'firstName' => $request->input('firstName'),
        'lastName' => $request->input('lastName'),
        'topic' => $request->input('topic'),
        'address' => $request->input('address'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
    ]);
    $user->addLawyerId($lawyer->id);
    return redirect('dashboard');
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
