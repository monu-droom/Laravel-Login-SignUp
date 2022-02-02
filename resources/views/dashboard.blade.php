@extends('header')
@section('content')
    <div class="card text-center p-3 mt-3 text-dark m-2" style="background: #00ffe5 !important;">
        <h5>Total Report Generated</h5>
        <h1 class="text-center">{{ $total_report }}</h1>
    </div>
    <div class="px-3 mr-3">
        <a class="btn btn-primary btn-block m-2 btn-sm" href="{{ route('water.report') }}">Create New Report</a>
    </div>
    <div class="card text-light p-3 mt-3 m-2" style="background: #6a00ff !important">
        <div>
            <span><strong>Name</strong> </span>: <span>&nbsp; {{ Auth::user()->name }}</span>
        </div>
        <div>
            <span><strong>Email</strong> </span>: <span>&nbsp; {{ Auth::user()->email }}</span>
        </div>
    </div>
    <div class="text-center">
        <a class="btn btn-danger btn-sm" href="{{ route('logout') }}">Logout</a>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection