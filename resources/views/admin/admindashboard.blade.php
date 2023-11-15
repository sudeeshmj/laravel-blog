@extends('layouts.app')
@section('content')
@include('components.usernavbar')

<div class="container my-4">
    <div  class="d-flex justify-content-between align-items-center mb-3">
        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
             <h6>Blog List</h6>
            <a href="{{route('user.list')}}">User List</a>
  </div>  
            <table class="table  table-hover table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SNo</th>
                    <th scope="col">Title</th>
                    <th scope="col">image</th>
                    <th scope="col">Posted on</th>
                    <th scope="col">Author</th>
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
                        {{$blog->users->name}}
                    </td>
                  </tr> 
                   @endforeach
                   @endif
                </tbody>
              </table>

    

</div>

@endsection