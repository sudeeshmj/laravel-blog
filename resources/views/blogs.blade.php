@extends('layouts.app')
@section('content')
@include('components.navbar')


<div class="container m-5 p-2 mx-auto">

    <div class="row">
      @foreach ($blogs as $blog)
     
      <div class="card mb-3">
        <div class="row  ">
          <div class="col-md-2" style="align-self: center;">
            <img src="{{ asset('img/'.$blog->image) }}" class="card-img-top h-25" alt="..." style="height: 150px !important;">
          </div>
          <div class="card-body col-md-10">
            <h5 class="card-title">{{$blog->title}}</h5>
       
          @php
               $new_string = substr($blog->content , 0, 500);
               if(strlen($new_string) > 150 ){
                $new_string .='.........';
               }
              
          @endphp
            <p class="card-text">{!!   $new_string  !!}</p>
            <p class="card-text d-flex justify-content-between" >Author : {{ $blog->users->name}}
              <span >Posted on {{$blog->postdate}}</span>
            </p>
            <a href="#">Read more</a>
          </div>
        </div>
      </div>
   
      @endforeach




       
     
        
      </div>

   
</div>
@endsection