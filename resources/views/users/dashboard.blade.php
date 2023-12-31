@extends('layouts.app')
@section('content')
@include('components.usernavbar')

<div class="container my-4">
    <div  class="d-flex justify-content-between align-items-center mb-3">
        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
             <h6>Manage Blogs</h6>
            <a href="{{ route('create.user.blog') }}" class="btn btn-primary btn-sm" >Add New Post</a>
  </div>  
            <table class="table  table-hover table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SNo</th>
                    <th scope="col">Title</th>
                    <th scope="col">image</th>
                    <th scope="col">Posted on</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="blogtr"  token="{{csrf_token()}}">
                    @if($bloglist->isEmpty())
                    <tr><td colspan="6" class="text-center">No Records found</td></tr>
                    @else
                   @foreach ($bloglist as $blog)
                   <tr>
                    <td>{{$loop->iteration}}</td>
                    <td >{{$blog->title}}</td>
                    <td ><img src="{{asset('img/'.$blog->image)}}" alt="prof_img" style="width: 50px; height: 50px;"></td>
                    <td >{{$blog->postdate}}</td>
                    <td >
                        <a href="{{route('edit.user.blog',$blog->id)}}" class="btn btn-sm btn-warning">Edit</a>
                        <button onclick="deleteBlog({{$blog->id}})" class="btn btn-sm btn-danger" >Delete</button>
                    </td>
                  </tr> 
                   @endforeach
                   @endif
                </tbody>
              </table>

    

</div>

<script>
  function deleteBlog(id){
    
      $.ajax({
        type:'POST',
        url :"{{route('delete.user.blog')}}",
            headers: {
                 'X-CSRF-TOKEN': $('.blogtr').attr('token')
        },
        data:{blog_id:id},
          success: function(response) {
           
            if (response.success) {
                    window.location.href = "{{ route('user.dashboard') }}";
                    
                } else {
                    alert(response.message);
                }
            },
            error: function(error) {
              alert("Post deletion operation failed");
            }
      })
    
  }
  </script>
@endsection