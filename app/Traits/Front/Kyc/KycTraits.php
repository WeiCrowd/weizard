<?php

namespace App\Traits\Front\Kyc;

use Auth;
use App\Helpers\Helper;

trait KycTraits {

    function createKycRequest($request) {
        
        $input['user_id'] = Auth::user()->id;
        $input['first_name'] = $request['first_name'];
        $input['last_name'] = $request['last_name'];
        $input['gender'] = $request['gender'];
        $input['address'] = $request['address'];
        $input['apartment_floor'] = $request['apartment_floor'];
        $input['other'] = $request['other'];
        $input['city'] = $request['city'];
        $input['state'] = $request['state'];
        $input['country_id'] = $request['country_id'];
        $input['postal_code'] = $request['postal_code'];
        $input['country_code'] = $request['country_code'];
        $input['mobile'] = $request['mobile'];
        $input['dob'] = date("Y-m-d",strtotime($request['dob']));
        $input['id_type'] = $request['id_type'];
        $input['issue_date'] = date("Y-m-d",strtotime($request['issue_date']));
        $input['valid_date'] = $request['valid_date'] == ""?"":date("Y-m-d",strtotime(str_replace('/','-',$request['valid_date'])));

        return $input;
    }
    
    function createKycOccupationRequest($request) {
        $input['occupation'] = $request['occupation'];
        $input['occupation_desc'] = @$request['occupation_desc'];
        $input['salary'] = @$request['salary'];
        $input['saving'] = @$request['saving'];
        $input['annual_income'] = @$request['annual_income'];
        return $input;
    }


}
