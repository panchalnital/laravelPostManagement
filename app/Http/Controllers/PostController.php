<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index(Request $request){
        $id=$request->user()->id;
        $posts=Post::where('user_id',$id)->get();       
        return view('dashboard',compact('posts'));
       
    }
    public function addPost(){
        return view('addpost');
    }

    public function store(Request $request)
     {  
        try{
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'file' => 'required',
            ]);

            $posts=new Post;
            $posts->title=$request->input('title');
            $posts->content=$request->input('content');
            $posts->user_id=$request->user()->id;
            $posts->status='2';
        
            $posts->file_path=$request->file('file')->store('posts');
            $posts->save();
            return redirect()->route('dashboard')
                            ->with('success','User created successfully.');
        }catch(Exception $exception){
            Session::flash('error', 'Action failed! Please try again');
        }
                
    }

    public function edit($id)
    {
      $post = Post::find($id);
     
      return view('editpost', compact('post'));
    }

    public function show($id)
    {
      $post = Post::find($id);
     
      return view('showpost', compact('post'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'file' => 'required',
        ]);


        $posts=Post::find($id);
        $posts->title=$request->input('title');
        $posts->content=$request->input('content');
        $posts->user_id=$request->user()->id;
        $posts->status='2';
        if($request->file('file')){
            $posts->file_path=$request->file('file')->store('posts');
        }
        $posts->save();


        return redirect()->route('dashboard')
                            ->with('success','User created successfully.');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
         return redirect()->route('dashboard')
            ->with('success', 'Post deleted successfully');
    }

    public function getPost(){
        try{
            $posts = Post::latest()->get();
            return view('admin.post',compact('posts'));

        }catch(Exception $exception){
            Session::flash('error', 'Action failed! Please try again');
        }
    
       
    }
}
