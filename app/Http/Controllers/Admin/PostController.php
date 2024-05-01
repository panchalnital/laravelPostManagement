<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use DataTables;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::latest()->get();
        return view('admin.post',compact('posts'));
       
    }

    public function getPost(Request $request)
    {
        //if ($request->ajax()) {
            $data = Post::latest()->get();
           
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        //}
    }
}
