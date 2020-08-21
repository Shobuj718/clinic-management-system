<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\OpdSales;
use App\Models\Test;
use App\Models\Doctor;
use Auth;


class DashboardController extends Controller
{
    //define constructor with middleware

    public function __construct()
    {
    	$this->middleware('auth');

    }

    public function index()
    {
    	  $user = Auth::user()->id;
        $patients = Patient::get();
        $appointments = Appointment::get();
        $opds = OpdSales::whereDate('created_at' , '=', date('Y-m-d'))->get();
        $pending['appointment'] = Appointment::where('status', 0)->count();
        $pending['completed'] = Appointment::where('status', 1)->count();
        $total_doctor = Doctor::get()->count();
      

    	return view('dashboard' , compact('appointments','patients' , 'pending' , 'opds', 'total_doctor'));

    }
}
