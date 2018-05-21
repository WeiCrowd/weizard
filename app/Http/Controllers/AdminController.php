<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function dashboard(){
        dd(21);
        //$user = auth()->guard('admin')->user();
       // dd($user);
    }
}