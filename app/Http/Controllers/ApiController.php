<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;
class ApiController  extends Controller
{
    public function getBlogs(){
        $blogs = Blog::with('users')->latest()->get();
       
        if ($blogs->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No records found.',
            ]);
        }


        $transformedBlogs = $blogs->map(function ($blog) {
            return [
                'id' => $blog->id,
                'title' => $blog->title,
                'content' => $blog->content,  
                'author' => $blog->users->name, 
             //   'image' => asset('img/' . $blog->image), 
                  'image' =>  $blog->image,
                'postdate' => $blog->postdate,
               
            ];
        });
    
        return response()->json([
            'status' => 200,
            'data' => $transformedBlogs,
        ]);
    }
}
