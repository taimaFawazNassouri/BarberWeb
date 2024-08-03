<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Day;


class HomeController extends Controller
{
    public function show(){
        $services = Service::all();
        return view('index',compact('services'));
    }
}
