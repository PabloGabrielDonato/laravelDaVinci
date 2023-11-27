<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
        $categorys = Category::all();
        return view('postCrear', ['categorys' => $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $messages = [
            'title.required' => 'El título es requerido',
            'title.max' => 'El título no puede tener más de 255 caracteres',
            'descripcion.required' => 'La descripción es requerida',
            'descripcion.max' => 'La descripción no puede tener más de 255 caracteres',
            'price.required' => 'El precio es requerido',
            'price.numeric' => 'El precio debe ser un número',
        ];

        $request->validate([
            'title' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'price' => 'required|numeric',
        ], $messages);
        
        $user = User::find(Auth::user()->id);
        $post = Post::create([
            'title' => $request->input('title'),
            'descripcion' => $request->input('descripcion'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'lawyer_id' => $user->lawyer_id,
        ]);

        $categorysForm = [
            'laboral' => $request->input('laboral'),
            'jubilacion' => $request->input('jubilacion'),
            'pension' => $request->input('pension'),
            'judicial' => $request->input('judicial')
        ];

        $selectedCategorys = [];
        foreach ($categorysForm as $key => $value) {
            if ($value != '') {

                array_push($selectedCategorys, $value);
            }
        }


        $post->categories()->attach($selectedCategorys);
        $post->save();


        return redirect('/dashboard');
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
        $post = Post::find($id);
        return view('postEditar', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }


    public function editPost(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $messages = [
            'title.required' => 'El título es requerido',
            'title.max' => 'El título no puede tener más de 255 caracteres',
            'descripcion.required' => 'La descripción es requerida',
            'descripcion.max' => 'La descripción no puede tener más de 255 caracteres',
            'price.required' => 'El precio es requerido',
            'price.numeric' => 'El precio debe ser un número',
        ];

        $request->validate([
            'title' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'price' => 'required|numeric',
        ], $messages);

        $title = $request->input('title');
        $descripcion = $request->input('descripcion');
        $price = $request->input('price');
        $id = $request->input('id');
        $post = Post::find($id);
        $post->title = $title;
        $post->descripcion = $descripcion;
        $post->price = (int)$price;
        $post->save();
        return redirect('dashboard');
    }

    public function delete(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $id = $request->input('id');
        Post::destroy($id);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
    }
}
