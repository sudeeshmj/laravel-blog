@extends('layouts.app')
@section('content')
@include('components.navbar')


<div class="container m-5 p-2 mx-auto">

    <div class="row">
        <div class="col">
            <div class="card" >
                <img src="{{ asset('img/laravelimg.png') }}" class="card-img-top h-25" alt="..."  style="height: 150px !important;">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" >Go somewhere</a>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card" >
                <img src="{{ asset('img/laravelimg.png') }}" class="card-img-top h-25" alt="..."  style="height: 150px !important;">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" >Go somewhere</a>
                </div>
              </div>
        </div>
        <div class="col">
            <div class="card" >
                <img src="{{ asset('img/laravelimg.png') }}" class="card-img-top h-25" alt="..."  style="height: 150px !important;">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#">Read More</a>
                </div>
              </div>
        </div>
        
      </div>

   
</div>
@endsection