@extends('layouts.app')

@section('content')
<main class="login-form mt-5">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if (session()->has('message'))
                        <p class="alert alert-danger p-2 text-center">{{session()->get('message')}}</p>
                @endif
                <div class="card">
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('do.login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" placeholder="Email" id="email" class="form-control" name="email" 
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" >
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                          

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Signin</button>
                            </div>
                        </form>
                    </div>
                </div>
                <span>Not Registered? <a href="{{route('registration')}}">Sign Up</a></span>
            </div>
          
        </div>
    </div>
</main>
@endsection