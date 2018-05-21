<?php

namespace App\Http\Controllers\Front\Kyc;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Models\Admin\Master\Country;
use App\Http\Controllers\Controller;
use App\Models\Front\Kyc\Kyc;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Front\KycRequest;
use App\Http\Requests\Front\KycOccupationRequest;


class KycController extends Controller
{
    use \App\Traits\Front\Kyc\KycTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }
    
    
    /**
     * List ICO Submission
     * @param Request $request
     * @return type
     */
//    protected function index(Request $request)
//    {
//        $data['ico'] = Icosubmission::teamMembers($id='',Auth::id());
//        return view('front.startup.IcoList',$data);
//    }
    
    /**
     * Create/Edit Kyc Submission
     * @param Request $request
     * @return type
     */
    protected function create($id = "")
    {   
        $data['country'] = Country::getAllCountry();
        $data['data'] = Kyc::getKycDataByUserId(Auth::user()->id);
        return view('front.kyc.add_kyc_form_1',$data);
    }
    
   
    /**
     * Save/Update ICO Submission
     * @param Request $request
     * @return type
     */
    public function save(KycRequest $request)
    {   
        $requestVar = $request->all();
        $id = isset($requestVar['id']) ? $requestVar['id'] : 0;
        $requestTrait = $this->createKycRequest($requestVar);
        $data['data'] = Kyc::storeData((int) $id, $requestTrait);
        return Redirect(route('kyc_occupation'));
        
//        if (empty($id)) {
//           $request->session()->flash('alert-success', 'Record Created Successfully');
//        } else {
//           $request->session()->flash('alert-success', 'Record Updated Successfully');
//        }
        
    }
    
    public function createOccupation($id = "")
    {   
        $data['data'] = Kyc::getKycByUserId(Auth::user()->id);
        
        $data['annual_income'] = ['Less Than 5,00000' => 'Less Than 5,00000', 'More Than 10,00000' => 'More Than 10,00000', 'More Than 20,00000' => 'More Than 20,00000'];
        
        return view('front.kyc.add_kyc_form_2',$data);
    }
    
   
    
     public function saveOccupation(KycOccupationRequest $request)
    {   
        $requestVar = $request->all();
        $id = isset($requestVar['id']) ? $requestVar['id'] : 0;
        $requestTrait = $this->createKycOccupationRequest($requestVar);
        $data['data'] = Kyc::storeData((int) $id, $requestTrait);
        return Redirect(route('kyc'));
        
//        if (empty($id)) {
//           $request->session()->flash('alert-success', 'Record Created Successfully');
//        } else {
//           $request->session()->flash('alert-success', 'Record Updated Successfully');
//        }
        
    }

}
