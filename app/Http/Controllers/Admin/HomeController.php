<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    //
    public function index(){
        $posts=Post::count();     
        return view('admin.dashboard',compact('posts'));
    }
}
