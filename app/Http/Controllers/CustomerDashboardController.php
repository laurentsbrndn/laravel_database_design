<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsCustomer;

class CustomerDashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [

        ]);
    }
}
