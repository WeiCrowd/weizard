<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Models\Front\User\Investor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\Investor\InvestorRequest;

class InvestorController extends Controller
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
        $data['investor'] = Investor::getInvestorData();
        
        if (count($data['investor'])) {
            foreach ($data['investor'] as $object) {
                $invest[] = (array) $object;
            }
            $data['investor_data'] = $invest;
        } else {
            $data['investor_data'] = [];
        }
        
        return view('admin/user/investor/list', $data);
    }

   
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['edit_investor'] = Investor::find($id);
        return view('admin/user/investor/edit', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvestorRequest $request)
    {
        $id = isset($request['id']) ? $request['id'] : '';
        
        $data['name'] = $request['name'];
        $res = Investor::UpdateInvestor($data,(int)$id);
        $request->session()->flash('alert-success', 'Record Updated Successfully');
        return Redirect::to('admin/investor');
    }

   
}