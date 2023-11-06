<?php

use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\UserData;
use App\Models\Lawyer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts = Post::all()->take(4);
    return view('landing', ['posts'=>$posts]);
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {
    $user = User::where('email',$request->input('email'))
    // ->where('role','lawyer')
    // ->orWhere('role','no-lawyer')
    ->first();

    Auth::login($user);

    return redirect('dashboard');
});

Route::post('/logout', function(){
    Auth::logout();
    return redirect ('/login');
}) -> name('logout');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function (Request $request) {
    $userData = UserData::create([
        'dni'=>$request->input('dni'),'avatar'=>$request->input('avatar')
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
});

Route::get('/lawyer/create', function () {
    if(!Auth::check()){
        return redirect ('login');
    }

    $user = User::find(Auth::getUser()->id);
    return view('lawyerCreate', ['user'=> $user]);
});
Route::post('/lawyer/create', function (Request $request) {
    if(!Auth::check()){
        return redirect ('login');
    }

    $user = User::find(Auth::getUser()->id);
    $lawyer = Lawyer::create([
        'firstName'=> $request->input('firstName'),
        'lastName'=> $request->input('lastName'),
        'topic'=> $request->input('topic'),
        'address'=> $request->input('address'),
        'phone'=> $request->input('phone'),
        'email'=> $request->input('email'),
    ]);
    $user->addLawyerId($lawyer->id);
    return redirect('dashboard');
});


Route::get('/dashboard', function () {
    if(! Auth::check()){
        return redirect ('login');
    }
    
    $user = User::find(Auth::getUser()->id);
    return view('dashboard', ['user'=> $user,'userData'=>$user->userData,'lawyer'=>$user->lawyer]);
    
})->name('dashboard');

Route::post('/post/editar', function(Request $request){
    $title=$request->input('title');
    $descripcion=$request->input('descripcion');
    $price=$request->input('price');
    $id=$request->input('id');
    $post=Post::find($id);
    $post->title=$title;
    $post->descripcion=$descripcion;
    $post->price=(int)$price;
    $post->save();
    return redirect('dashboard');
})->name('post.editar');


Route::get('/post/editar/{id}', function(string $id){
    $post=Post::find($id);
    return view('postEditar', ['post'=>$post]);
});

Route::post('/post/eliminar', function (Request $request) {
    if(! Auth::check()){
        return redirect ('login');
    }
    $id=$request->input('id');
    Post::destroy($id);
    return redirect ('/dashboard');

})->name('post.eliminar'); 


Route::get('/post/crear', function (){
    $categorys=Category::all();
    return view('postCrear', ['categorys'=>$categorys]);
});
Route::post('/post/crear', function (Request $request){
    if(!Auth::check()){
        return redirect('/login');
    }
    $user = User::find(Auth::user()->id);
    $post=Post::create([
        'title'=>$request->input('title'),
        'descripcion'=>$request->input('descripcion'),
        'price'=>$request->input('price'),
        'image'=>$request->input('image'),
        'lawyer_id'=>$user->lawyer_id,
    ]);
    
    $categorysForm = [
        'laboral'=>$request->input('laboral'), 
        'jubilacion'=>$request->input('jubilacion'), 
        'pension'=>$request->input('pension'),
        'judicial'=>$request->input('judicial')
    ];

    $selectedCategorys = [];
    foreach($categorysForm as $key => $value){
        if($value != ''){
            
            array_push($selectedCategorys, $value);
        }
    }
   
    
    $post->categories()->attach($selectedCategorys);
    $post -> save();
    

    return redirect('/dashboard');
});


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');