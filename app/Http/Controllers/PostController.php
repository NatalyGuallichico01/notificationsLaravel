<?php

namespace App\Http\Controllers;

use App\Notifications\PostNotification;
use App\Post;
use App\User;
use App\Events\PostEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class PostController extends Controller
{
    public function create(){
        return view('post.create');
    }
    //guardamos los datos del usuario que esta logeado
    public function store (Request $request){
        $data=$request->all();
        $data['user_id']=Auth::id();//hacemos el llamado al userid
        $post=Post::create($data);//guardamos los datos

        //$user->notify(new InvoicePaid($invoice));//ENVIO DE NOTIFICACIONES
        //auth()->user()->notify(new PostNotification($post));
        
        /*User::all()
            ->except($post->user_id)
            ->each(function(User $user) use ($post){
                $user->notify(new PostNotification($post));
            });*/
        // LLAMAMOS AL EVENTO
        event(new PostEvent($post));

        return redirect()->back()->with('message', 'Post creado satisfactoriamente');
        //return 'ok';
    }

    public function index(){
        $postNotifications=auth()->user()->unreadNotifications();
        return view('post.notifications', compact('postNotifications'));
    }
}
