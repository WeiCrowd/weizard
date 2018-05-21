<?php

namespace App\Http\Controllers\Admin\User;

use Auth;
use Excel;
use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Models\Front\Ico\Icoteam;
use App\Http\Controllers\Controller;
use App\Models\Front\Ico\Icosubmission;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Front\IcoSubmissionRequest;
use App\Models\Front\Ico\IcoCategory;
use App\Models\Front\Ico\IcoSocialLinksType;
use App\Models\Front\Ico\IcoSocialLink;

class IcoController extends Controller
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
        
        $data['inactiveIco'] = Icosubmission::getAdminIcoDataByStatus('0');
        
        $data['activeIco']   = Icosubmission::getAdminIcoDataByStatus('1');
        
        if (count($data['activeIco'])) {
            foreach ($data['activeIco'] as $object) {
                $ico[] = (array) $object;
            }
            $data['active_ico'] = $ico;
        } else {
            $data['active_ico'] = [];
        }
        
        
        if (count($data['inactiveIco'])) {
            foreach ($data['inactiveIco'] as $object) {
                $ico_in[] = (array) $object;
            }
            $data['inactive_ico'] = $ico_in;
        } else {
            $data['inactive_ico'] = [];
        }
        
        return view('admin/user/ico/list', $data);
    }

   
    public function updateMultipleIcoStatus(Request $request)
    {
        
        if ($request['inactive-icos'] != "") {
            
            $ids       = $request['inactive-icos'];
            $arr       = explode(',', $ids);
             
            $statusArr = [];
            foreach ($arr as $k) {
                $statusArr['ico_status']    = '0';
                $result = Icosubmission::updateIcoStatus($statusArr, $k);
                $icoDetails = Icosubmission::getAllDataByID($k);
                if($result){
                    $userDetails = User::find($icoDetails[0]->user_id);
                    //Mail to User
                    $mailData = [];
                    $mailData['email'] = $userDetails->email;
                    $mailData['name'] = $userDetails->name;
                    $mailData['ico_name'] = ucwords($icoDetails[0]->name);
                    $mailData['status'] = 'inactive';
                    $arrData = $mailData;
                    Mail::send('email/ico', $arrData, function($message) use ($mailData) {
                            $message->to($mailData['email'], $mailData['name'])
                             ->subject('ICO Submission on WeiZard');
                    });
                  
                }
            }
        } else {
            $ids       = $request['active-icos'];
            $arr       = explode(',', $ids);
            
            $statusArr = [];
            foreach ($arr as $k) {
                $newToken = 0;
                $arrToken = [];
                $totalToken = 0;
                $icoDetails = Icosubmission::getAllDataByID($k);
                $totalToken = User::getUserDetailsByID($icoDetails[0]->user_id);
                if(count($totalToken)<1){
                    $arrToken = ['totToken' => '5'];
                }else{
                    $newToken = $totalToken->totToken + 5;
                    $arrToken = ['totToken' => $newToken];
                    
                }
                User::updateProfile($arrToken, $icoDetails[0]->user_id);
                $statusArr['ico_status']    = '1';
                $result = Icosubmission::updateIcoStatus($statusArr, $k);
                
                if($result){
                    $userDetails = User::find($icoDetails[0]->user_id);
                    //Mail to User
                    $mailData = [];
                    $mailData['email'] = $userDetails->email;
                    $mailData['name'] = $userDetails->name;
                    $mailData['ico_name'] = ucwords($icoDetails[0]->name);
                    $mailData['status'] = 'active';
                    $arrData = $mailData;
                    Mail::send('email/ico-status', $arrData, function($message) use ($mailData) {
                            $message->to($mailData['email'], $mailData['name'])
                             ->subject('ICO Submission on WeiZard');
                    });
                  
                }
                
            }
        }

        $request->session()->flash('alert-success',
            'ICO status successfully updated!');
        return Redirect::to('admin/ico');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = IcoCategory::getData();
        $data['edit_ico'] = Icosubmission::find($id);
        if($id != ''){
            $data['edit_team'] = Icoteam::getAllDataByID($id);
            $ico_id = IcoSocialLink::getAllDataByIcoId((int)$id);
            $link_type = IcoSocialLinksType::getAllData();
            foreach($link_type as $value){
            $linkArr[$value->name] = $value->name;
        }
        $data['link_type'] = $linkArr;
        $data['edit_social'] = $ico_id;
        }
        return view('admin/user/ico/edit', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = isset($request['id']) ? $request['id'] : '';
        
        //$data['user_id'] = Auth::id();
        $data['category_id'] = $request['category_id'];
        $data['name'] = $request['name'];
        
        $data['short_description'] = $request['short_description'];
        $data['concept'] = $request['concept'];
        $data['start_time'] = $request['start_time'];
        $data['end_time'] = $request['end_time'];
        $data['soft_cap'] = $request['soft_cap'];
        $data['hardcap'] = $request['hardcap'];
        $data['restriction'] = $request['restriction'];
        $data['accepts'] = $request['accepts'];
        $data['token_price'] = $request['token_price'];
        $data['whitelist'] = $request['whitelist'];
        $data['kyc'] = $request['kyc'];
        $data['technology'] = $request['technology'];
        $data['origin_country'] = $request['origin_country'];
        //$data['kyc_id'] = $request['kyc_id'];
        
        $symbolpath = 'ICO/SymbolImage/';
        $kycpath = 'ICO/KycDoc/';
        $bannerpath = 'ICO/BannerImage/';
        $logopath = 'ICO/LogoImage/';
        
        if($request['symbol'] != ""){
            $data['symbol'] = $request['symbol'];
            $data['symbol_image'] = "";
        }else{
            //Symbol Image
            if ($request['symbol_image'] != "") {
                $symbol_img = time().uniqid(rand()).'.'.$request->symbol_image->getClientOriginalExtension();
                if (!is_dir($symbolpath)) {
                    mkdir($symbolpath, 0777, true);
                }
                $request->symbol_image->move(($symbolpath), $symbol_img);
            } else {
                if($id != ""){
                    $symbol_img = $request['old_symbol_image'];
                }else{
                    $symbol_img = '';
                }
            }

            $data['symbol_image'] = $symbol_img;
            $data['symbol'] = "";
        }
        
        
        //Banner Image
        if ($request['banner_image'] != "") {
            $banner_img = time().uniqid(rand()).'.'.$request->banner_image->getClientOriginalExtension();
            if (!is_dir($bannerpath)) {
                mkdir($bannerpath, 0777, true);
            }
            $request->banner_image->move(($bannerpath), $banner_img);
        } else {
            if($id != ""){
                $banner_img = $request['old_banner_image'];
            }else{
                $banner_img = '';
            }
        }
        
        $data['banner_image'] = $banner_img;
        
        //Logo Image
        if ($request['logo_image'] != "") {
            $logo_img = time().uniqid(rand()).'.'.$request->logo_image->getClientOriginalExtension();
            if (!is_dir($logopath)) {
                mkdir($logopath, 0777, true);
            }
            $request->logo_image->move(($logopath), $logo_img);
        } else {
            if($id != ""){
                $logo_img = $request['old_logo_image'];
            }else{
                $logo_img = '';
            }
        }
        
        $data['logo_image'] = $logo_img;
        
        //Kyc Doc
//        if ($request['kyc_doc'] != "") {
//           $kyc_document = time().uniqid(rand()).'.'.$request->kyc_doc->getClientOriginalExtension();
//           if (!is_dir($kycpath)) {
//               mkdir($kycpath, 0777, true);
//           }
//           $request->kyc_doc->move(($kycpath), $kyc_document);
//        } else {
//            
//            if($id != ""){
//                $kyc_document = $request['old_kyc_doc'];
//            }else{
//                $kyc_document = '';
//            }
//            
//        }
//        
//        $data['kyc_doc'] = $kyc_document;
        
        $data['video'] = $request['video'];
        $data['website'] = $request['website'];
        $data['blog'] = $request['blog'];
        $data['whitepaper'] = $request['whitepaper'];
//        $data['facebook'] = $request['facebook'];
//        $data['twitter'] = $request['twitter'];
//        $data['linkedin'] = $request['linkedin'];
//        $data['slack_chat'] = $request['slack_chat'];
//        $data['telegram_chat'] = $request['telegram_chat'];
//        $data['github'] = $request['github'];
        $data['facebook'] = '';
        $data['twitter'] = '';
        $data['linkedin'] = '';
        $data['slack_chat'] = '';
        $data['telegram_chat'] = '';
        $data['github'] = '';
        
        $ico_id = Icosubmission::storeData($data,(int)$id);
        
        IcoSocialLink::deleteSocialLink($id);
        foreach($request['link_type'] as $key => $value){
            $linkData['ico_id'] = $id;
            $linkData['link_type'] = $value;
            $linkData['url'] = $request['url'][$key];
            $ico_social = IcoSocialLink::storeData($linkData,$link_id = '');
        }
        
        $res1 = array_filter($request['member_name'], function($value) {
            return $value !== '';
        });
         
        Icoteam::deleteTeamMember($ico_id['id']);
        $teamData = [];
        for ($i = 0; $i < count($res1); $i++) {
            if ($request['member_name'][$i] != '') {
                $teamData['ico_id'] = $ico_id['id'];
                $teamData['member_name'] = $request['member_name'][$i];
                $teamData['member_designation'] = $request['member_designation'][$i];
                Icoteam::SaveIcoTeam($teamData);
            }
        } 
        
        if (empty($id)) {
           $request->session()->flash('alert-success', 'Record Created Successfully');
        } else {
            $request->session()->flash('alert-success', 'Record Updated Successfully');
        }
       
        return Redirect::to('admin/ico');
    }
    
     /**
     * Filter Customer
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function icoInactiveFilters(Request $request)
    {
        $allIco = Icosubmission::allIcoFilter($request, '');
        $data['inactiveIco'] = Icosubmission::allIcoFilter($request, '0');        
        $data['activeIco'] = Icosubmission::getAdminIcoDataByStatus('1');
        
        $data['name']   = $request['name'];
        $data['customer_id']  = $request['customer_id'];        
        $data['search_active']   = $allIco;
        
        if (count($data['activeIco'])) {
            foreach ($data['activeIco'] as $object) {
                $ico[] = (array) $object;
            }
            $data['active_ico'] = $ico;
        } else {
            $data['active_ico'] = [];
        }       
        
        if (count($data['inactiveIco'])) {
            foreach ($data['inactiveIco'] as $object) {
                $ico_in[] = (array) $object;
            }
            $data['inactive_ico'] = $ico_in;
        } else {
            $data['inactive_ico'] = [];
        }
        
        
         if (count($data['inactive_ico'])) {
            if ($request['download'] != "") {
                $type = 'xls';
                
                return Excel::create('Inactive_ICO',
                        function($excel) use ($data) {
                        $excel->sheet('Inactive_ICO',
                            function($sheet) use ($data) {
                            for ($i = 0; $i < count($data['inactive_ico']); $i++) {
                                
                                if ($data['inactive_ico'][$i]['ico_status'] == '1') {
                                    $data['inactive_ico'][$i]['ico_status'] = 'Active';
                                } else {
                                    $data['inactive_ico'][$i]['ico_status'] = 'Inactive';
                                }                           
                
                            }
                            $sheet->fromArray($data['inactive_ico']);
                        });
                        
                    })->download($type);
            }
           // $data['customer_data'] = $customer;
        }
        return view('admin/user/ico/list', $data);
    }

    public function icoActiveFilters(Request $request)
    {
        $allIco = Icosubmission::allIcoFilter($request, '');
        $data['inactiveIco'] = Icosubmission::getAdminIcoDataByStatus('0');
        $data['activeIco'] = Icosubmission::allIcoFilter($request, '1');
        
        $data['name']   = $request['name'];
        $data['customer_id']  = $request['customer_id'];        
        $data['search_active']   = $allIco;
        
        if (count($data['activeIco'])) {
            foreach ($data['activeIco'] as $object) {
                $ico[] = (array) $object;
            }
            $data['active_ico'] = $ico;
        } else {
            $data['active_ico'] = [];
        }       
        
        if (count($data['inactiveIco'])) {
            foreach ($data['inactiveIco'] as $object) {
                $ico_in[] = (array) $object;
            }
            $data['inactive_ico'] = $ico_in;
        } else {
            $data['inactive_ico'] = [];
        }
        
         if (count($data['active_ico'])) {
            if ($request['download'] != "") {
                $type = 'xls';
                
                return Excel::create('Active_ICO',
                        function($excel) use ($data) {
                        $excel->sheet('Active_ICO',
                            function($sheet) use ($data) {
                            for ($i = 0; $i < count($data['active_ico']); $i++) {
                                
                                if ($data['active_ico'][$i]['ico_status'] == '1') {
                                    $data['active_ico'][$i]['ico_status'] = 'Active';
                                } else {
                                    $data['active_ico'][$i]['ico_status'] = 'Inactive';
                                }                           
                
                            }
                            $sheet->fromArray($data['active_ico']);
                        });
                        
                    })->download($type);
            }
        }
        return view('admin/user/ico/list', $data);
    }



   
}