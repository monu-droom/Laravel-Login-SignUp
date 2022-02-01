<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Mail;
use App\Mail\MyMail;
use Session;
use App\Models\User;
use App\Models\WaterReport;
use Illuminate\Support\Facades\Auth;

class WaterReportController extends Controller
{
    public function getWaterReport(){
        return view('water_report');
        if(Auth::check()){
            return view('water_report');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }   
    public function postWaterReport(Request $request){
        // Form validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'bd_name' => 'required',
            'phone' => 'required|min:10',
            'tds_tap'=>'required',
            'tds_ro'=>'required',
            'ph_tap'=>'required',
            'ph_ro'=>'required',
            'flow'=>'required',
            'purifier' => 'required',
        ]);
        $report_array = [];
        $inputs = $request->all();
        $water_report = new WaterReport();
        $water_report->name = isset($inputs['name']) ? $inputs['name'] : '';
        $water_report->email = isset($inputs['email']) ? $inputs['email'] : '';
        $water_report->phone = isset($inputs['phone']) ? $inputs['phone'] : '';
        $water_report->address = isset($inputs['address']) ? $inputs['address'] : '';
        $water_report->bd_name = isset($inputs['bd_name']) ? $inputs['bd_name'] : '';
        $water_report->tds_tap = isset($inputs['tds_tap']) ? $inputs['tds_tap'] : '';
        $water_report->tds_ro = isset($inputs['tds_ro']) ? $inputs['tds_ro'] : '';
        $water_report->tds_jar = isset($inputs['tds_jar']) ? $inputs['tds_jar'] : '';
        $water_report->ph_tap = isset($inputs['ph_tap']) ? $inputs['ph_tap'] : '';
        $water_report->ph_ro = isset($inputs['ph_ro']) ? $inputs['ph_ro'] : '';
        $water_report->ph_jar = isset($inputs['ph_jar']) ? $inputs['ph_jar'] : '';
        $water_report->flow = isset($inputs['flow']) ? $inputs['flow'] : '';
        $water_report->installed_ro = isset($inputs['installed_ro']) ? $inputs['installed_ro'] : '';
        $water_report->purifier = isset($inputs['purifier']) ? $inputs['purifier'] : '';
        if($water_report->save()){                
            array_push($report_array, $water_report);
            $array = [
                'view' => 'final_report',
                'report_array' => $report_array,
                'water_report' => $water_report
            ];
            // Mail::to('monudah96@gmail.com')->send(new MyMail($array));
            return view('final_report', compact('array'));
        }
    }
}