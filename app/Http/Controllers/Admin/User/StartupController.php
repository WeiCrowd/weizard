<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Front\User\Startup;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\Startup\StartupRequest;

class StartupController extends Controller
{

    public function __construct()
    {
        $this->middleware('CheckACL');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $data['startup'] = Startup::getStartupData();
        
        if (count($data['startup'])) {
            foreach ($data['startup'] as $object) {
                $start[] = (array) $object;
            }
            $data['startup_data'] = $start;
        } else {
            $data['startup_data'] = [];
        }
        
        return view('admin/user/startup/list', $data);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['edit_startup'] = Startup::find($id);
        return view('admin/user/startup/edit', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StartupRequest $request)
    {
        $id = isset($request['id']) ? $request['id'] : '';
        $data['name'] = $request['name'];
        $res = Startup::UpdateStartup($data,(int)$id);
        $request->session()->flash('alert-success', 'Record Updated Successfully');
        return Redirect::to('admin/startup');
    }

   
}