<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    //
    public function index(){
        try{
            $posts = Post::latest()->get();
            return view('admin.post',compact('posts'));

        }catch(Exception $exception){
            Session::flash('error', 'Action failed! Please try again');
        }
    
       
    }

    public function show($id)
    {
      $post = Post::find($id);
     
      return view('admin.showpost', compact('post'));
    }
    
    public function statusyes($id)
    {
    
            DB::table('posts')
                ->where('id', $id)
                ->update(['status' => '1']);

      return redirect()->route('admin.post')
        ->with('success', 'Post updated successfully');
    }

    public function statusno($id)
    {
        DB::table('posts')
                ->where('id', $id)
                ->update(['status' => '2']);
      return redirect()->route('admin.post')
        ->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
         return redirect()->route('admin.post')
            ->with('success', 'Post deleted successfully');
    }

}
