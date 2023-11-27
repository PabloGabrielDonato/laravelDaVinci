<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = User::find(Auth::getUser()->id);
        return view('dashboard', ['user' => $user, 'userData' => $user->userData, 'lawyer' => $user->lawyer]);
    }


    public function pricing()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = User::find(Auth::getUser()->id);
        $posts = Post::all()->take(4);
        return view('pricing', ['posts'=>$posts]);
        
    }
    
        
    
}
