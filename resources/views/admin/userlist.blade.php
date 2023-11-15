@extends('layouts.app')
@section('content')
@include('components.usernavbar')

<div class="container my-4">
    <div  class="d-flex justify-content-between align-items-center mb-3">
        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
             <h6>Users List</h6>
            <a href="{{route('admin.dashboard')}}">Blog List</a>
  </div>  
            <table class="table  table-hover table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">SNo</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody class="blogtr"  token="{{csrf_token()}}">
                    @if($users->isEmpty())
                    <tr><td colspan="6" class="text-center">No Records found</td></tr>
                    @else
                   @foreach ($users as $user)
                   <tr>
                    <td>{{$loop->iteration}}</td>
                   
                    <td >{{$user->name}}</td>
                    <td >
                        {{$user->email}}
                    </td>
                  </tr> 
                   @endforeach
                   @endif
                </tbody>
              </table>

    

</div>

@endsection