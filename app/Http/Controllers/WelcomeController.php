<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Front\Ico\Icosubmission;
use App\Models\Front\Ico\IcoCategory;

class WelcomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['category'] = IcoCategory::getData();
        $data['categoryData'] = Icosubmission::getIcoByCategory($id = '');
        //$data['icoData'] = Icosubmission::getIcoDataByStatus('1');
        $data['upcomingIcoData'] = Icosubmission::getIcoByDatewise('Upcoming');
        $data['pastIcoData'] = Icosubmission::getIcoByDatewise('Past');
        $data['presentIcoData'] = Icosubmission::getIcoByDatewise('Present');
        return view('welcome', $data);
    }

           
    
}
