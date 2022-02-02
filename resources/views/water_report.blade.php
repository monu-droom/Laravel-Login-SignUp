@extends('header')
@section('title', 'Welcome to Water report generator')
@section('content')    
    <style>
        h2   {text-align: center;}
        p    {color: red;}
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <hr>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
        <div class="container">
        <h3>Enter Water Details </h3>
            <form action="{{ route('waterReport.submit') }}" method="POST">
            @csrf
                <div class="form-group my-2">
                    <input type="name" class="form-control" id="name" placeholder="Enter Customer Name" name="name" autocomplete="off">
                </div>
                <div class="form-group my-2">
                    <input type="phone" class="form-control" id="phone" placeholder="Enter Customer Mobile No." name="phone" autocomplete="off">
                </div>
                <div class="form-group my-2">
                    <input type="email" class="form-control" id="email" placeholder="Enter Customer Email" name="email" autocomplete="off">
                </div>
                <div class="form-group my-2">
                    <input type="address" class="form-control" id="address" placeholder="Enter Customer Address" name="address" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="name">Business Developement Executive:</label>
                    <select class="form-control" id="bd_name" name="bd_name">
                        <option>--Select BD Executive--</option>
                        <option>Vikas</option>
                        <option>Amit Sharma</option>
                        <option>Rohit</option>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <label for="tds">TDS:</label>
                    <span class="inline ml-2">
                        <input class="form-control my-1" type="text" size="13" name="tds_tap" autocomplete="off" placeholder="Tap Value"/> 
                        <input class="form-control my-1" type="text" size="13" name="tds_ro" autocomplete="off" placeholder="RO Value"/>
                        <input class="form-control my-1" type="text" size="13" name="tds_jar" autocomplete="off" placeholder="Jar Value"/>
                    </span>
                </div>
                <hr>
                <div class="form-group">
                    <label for="tds">PH:</label>
                    <span class="inline ml-2">
                        <input class="form-control my-1" type="text" size="13" name="ph_tap" autocomplete="off" placeholder="Tap Value"/> 
                        <input class="form-control my-1" type="text" size="13" name="ph_ro" autocomplete="off" placeholder="RO Value"/>
                        <input class="form-control my-1" type="text" size="13" name="ph_jar" autocomplete="off" placeholder="Jar Value"/>
                    </span>
                </div>
                <hr>
                <div class="form-group my-1">
                    <input type="text" class="form-control" id="flow" placeholder="Enter flow" name="flow" autocomplete="off">
                </div>
                <hr>
                <div class="form-group my-1">
                    <input type="text" class="form-control" id="installed_ro" placeholder="Enter Purifier/RO name" name="installed_ro" autocomplete="off">
                </div>
                <hr>
                <div class="form-group my-1">
                <label for="purifier">Suggested Purifier/RO Model:</label>
                <select class="form-control" id="purifier" name="purifier">
                    <option>--Select Purifier/RO--</option>
                    <option>ClassiX RO</option>
                    <option>ClassiX Purifier</option>
                    <option>Drink Pure Purifier</option>
                    <option>Excel Pure RO</option>
                    <option>Excel Pure Purifier</option>
                    <option>Dew Pond RO</option>
                    <option>Emperor Purifier</option>
                    <option>King Top Purifier</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-2">Submit</button>
            </form>
            <br>
            <br>
            <br>
            <br>
        </div>
        </section>
    </div>
@endsection