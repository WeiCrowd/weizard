<?php

namespace App\Http\Controllers\Admin\IcoCategory;

use Auth;
use Excel;
use App\User;
use Illuminate\Http\Request;
use App\Models\Front\Ico\Icoteam;
use App\Http\Controllers\Controller;
use App\Models\Front\Ico\IcoCategory;
use App\Models\Front\Ico\Icosubmission;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Front\IcoCategoryRequest;

class IcoCategoryController extends Controller
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
        
        $data['category'] = IcoCategory::getAllData();
        return view('admin/ico-category/list', $data);
    }

    public function create()
    {
        $data['edit_category'] = [];
        return view('admin/icocategory/list', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IcoCategoryRequest $request)
    {
        $id = isset($request['id']) ? $request['id'] : '';
        
        //$data['user_id'] = Auth::id();
        
        $data['name'] = strip_tags(trim($request['name']));
        IcoCategory::storeData($data, $id = '');
        
        if (empty($id)) {
           $request->session()->flash('alert-success', 'Record Created Successfully');
        } else {
            $request->session()->flash('alert-success', 'Record Updated Successfully');
        }
       
        return Redirect::to('admin/icocategory');
    }
   public function show($id = '')
    {
        $data['edit_category'] = IcoCategory::find($id);
        return view('admin/ico-category/edit', $data);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['edit_category'] = IcoCategory::find($id);
        return view('admin/ico-category/edit', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IcoCategoryRequest $request)
    {
        $id = isset($request['id']) ? $request['id'] : '';

        //$data['user_id'] = Auth::id();
        
        $data['name'] = $request['name'];
        IcoCategory::storeData($data, $id);
        
        if (empty($id)) {
           $request->session()->flash('alert-success', 'Record Created Successfully');
        } else {
            $request->session()->flash('alert-success', 'Record Updated Successfully');
        }
       
        return Redirect::to('admin/icocategory');
    }
    
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
       $result = IcoCategory::destroy($id);
       if(count($result)>0){
           $deletedRows = Icosubmission::where('category_id', $id)->delete();
         $request->session()->flash('alert-success', 'Record Deleted Successfully');  
       }else{
           $request->session()->flash('alert-danger', 'Something went wrong!');
       }
       return Redirect::to('admin/icocategory');
    }

   
}