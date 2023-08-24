<?php

namespace App\Http\Controllers;
use App\Models\Bed;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $isAvailable    = Bed::where('status', 0)->count();
        $isInUse        = Bed::where('status', 1)->count();

        return view('dashboard', ["isAvailable" => $isAvailable, "isInUse" => $isInUse]);
    }
}
