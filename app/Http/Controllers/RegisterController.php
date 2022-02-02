<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\WaterReport;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){        
        if(Auth::check()){
            $total_report = WaterReport::where('tech_id', Auth::user()->id)->count();
            return view('dashboard', compact('total_report'));
        }
        return view('welcome');        
    }
    public function postRegisterUser(Request $request){
        $inputs = $request->all();
        if(!empty($inputs)){
            $users = new User;
            $users->name = isset($inputs['name']) ? $inputs['name'] : '';
            $users->email = isset($inputs['email']) ? $inputs['email'] : '';
            $users->password = isset($inputs['password']) ? Hash::make($inputs['password']) : '';
            if($users->save()){
                return redirect('/');
            }
        }
    }
    public function getRegister(){
        return view('register');
    }
    public function login(){
        return view('login');
    }
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }  
        return back()->with('error', 'Login Details Are Not Valid');
    }
    public function dashboard(){
        if(Auth::check()){
            $total_report = WaterReport::where('tech_id', Auth::user()->id)->count();
            return view('dashboard', compact('total_report'));
        }
        return redirect("welcome")->with('error', 'You are not allowed to access');
    }
    public function logout() {
        Session::flush();
        Auth::logout();  
        return Redirect('/');
    }
    public function getApiData(Request $request){
        $id = $request->route('id');
        if(!empty($id)){
            $url = 'https://jsonplaceholder.typicode.com/posts/'.$id;
        }else{
            $url = 'https://jsonplaceholder.typicode.com/posts';
        }
        //  Initiate curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);
        return view('api_data', compact('result'));
    }
}
