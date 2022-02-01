@extends('header')
@section('title', 'Welcome to Water report generator')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
            </div>
        </section>
        <section class="content">
            <div class="card p-3">
        @if(Session::has('error'))
                <div class="alert alert-danger">
                {{ Session::get('error')}}
                </div>
            @endif
                <img src="{{asset('logo.jpeg') }}" style="width: 150px; margin: 0 auto;" alt="Logo" >
                    <form method="POST" action="{{ route('login.user') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="small">Email</label>
                    <input type="text" class="form-control" name="email">
                    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="small">Password</label>
                    <input type="password" class="form-control" name="password">
                    @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <button class="btn btn-primary btn-block">Login</button>
            </form>
            </div>
        </section>
    </div>
@endsection