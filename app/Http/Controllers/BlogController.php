<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class BlogController extends Controller
{
    
    public function index(){
      
        // $client = new Client(); 
        // $url = "https://jsonplaceholder.typicode.com/todos/1";


        // $response = $client->request('GET', $url, [ 
        //     'verify'  => false,
        // ]);

        // return  $responseBody = json_decode($response->getBody());

          

         $blogs = Blog::latest()->get();
        return view('blogs',compact('blogs'));
    }

//user dashboard blog actions


//create blog 

public function createUserBlog(){
    return view('createblogs');
}

public function addUserBlog(Request $request){
    try {

   
     
        $input = [
            'user_id'=>request('user_id'),
            'title'=>request('title'),
            'content'=>request('content'),
            'postdate'=>now()->format('Y-m-d'),
           
        ];
       

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->extension();
            $fileName = 'bolg_pic'.time().'.'. $extension;
            $file->move('img/', $fileName );
            $input['image']= $fileName ;
        }
     
        Blog::create($input);
        
          return response()->json(['success' => true, 'message' => 'Data inserted successfully']); 
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error inserting data', 'error' => $e->getMessage()]);
        }   
}


//edit

public function editUserBlog($id){
    $blog = Blog::where('id',$id)->first();
    
    return view('editblog',compact('blog'));
}
public function modifyUserBlog(Request $request){
    try {

     
        $input = [
            'user_id'=>request('user_id'),
            'title'=>request('title'),
            'content'=>request('content'),
            'postdate'=>now()->format('Y-m-d'),
           
        ];
       

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->extension();
            $fileName = 'bolg_pic'.time().'.'. $extension;
            $file->move('img/', $fileName );
            $input['image']= $fileName ;
        }
       
        $blog_id = request('id');
        $blog = Blog::find($blog_id);
    
        $blog ->update($input);
        return response()->json(['success' => true, 'message' => 'Blog Updated successfully']); 
    }
    catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Update Operation failed', 'error' => $e->getMessage()]);
    }  
}

//delete
public function deleteUserBlog(Request $request){
    try{
        $id = request('blog_id');
        $blog = Blog::find($id);
          $imagePath = public_path('img/' . $blog->image);
          if (File::exists($imagePath)) {
             File::delete($imagePath);
         }
        
         $blog->delete();

         $bloglist = Blog::where('user_id', Auth::user()->id)->latest()->get();

         return response()->json(['success' => true, 'message' => 'Blog deleted successfully.','data'=>$bloglist]);
    } 
    catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Delete Operation failed', 'error' => $e->getMessage()]);
    } 
}


public function userList(){
   $users =  User::where('status',0)->latest()->get();
    return view('admin.userlist',compact('users'));
}

}
