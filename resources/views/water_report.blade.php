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
        <div class="container" style="width:600px">
        <h2>Please enter the details </h2>
            <form action="{{ route('waterReport.submit') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="name">Customer Name:</label>
                    <input type="name" class="form-control" id="name" placeholder="Enter customer name" name="name">
                </div>
                <div class="form-group">
                    <label for="phone">Customer Mobile Number:</label>
                    <input type="phone" class="form-control" id="phone" placeholder="Enter customer mobile number" name="phone">
                </div>
                <div class="form-group">
                    <label for="email">Customer Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter customer email id" name="email">
                </div>
                <div class="form-group">
                    <label for="address">Customer Address:</label>
                    <input type="address" class="form-control" id="address" placeholder="Enter customer address id" name="address">
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
                <div class="form-group">
                    <label for="tds">TDS:</label>
                    <br>
                    <span class="inline ml-2">
                        Tap
                        <input class="inputbold" type="text" size="13" name="tds_tap" placeholder=""/> 
                        RO
                        <input class="inputbold" type="text" size="13" name="tds_ro" placeholder=""/>
                        Jar
                        <input class="inputbold" type="text" size="13" name="tds_jar" placeholder=""/>
                    </span>
                </div>
                <div class="form-group">
                    <label for="tds">PH:</label>
                    <br>
                    <span class="inline ml-2">
                        Tap
                        <input class="inputbold" type="text" size="13" name="ph_tap" placeholder=""/> 
                        RO
                        <input class="inputbold" type="text" size="13" name="ph_ro" placeholder=""/>
                        Jar
                        <input class="inputbold" type="text" size="13" name="ph_jar" placeholder=""/>
                    </span>
                </div>
                <div class="form-group">
                    <label for="flow">Flow:</label>
                    <input type="text" class="form-control" id="flow" placeholder="Enter flow" name="flow">
                </div>
                <div class="form-group">
                    <label for="installer ro">Installed Purifier/RO (If Any):</label>
                    <input type="text" class="form-control" id="installed_ro" placeholder="Enter Purifier/RO name" name="installed_ro">
                </div>
                <div class="form-group">
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
        </div>
        </section>
    </div>
@endsection