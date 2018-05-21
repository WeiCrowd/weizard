<?php

namespace App\Http\Controllers\Front\Startup;

use Auth;
use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Models\Front\Ico\Icoteam;
use App\Http\Controllers\Controller;
use App\Models\Front\Ico\Icosubmission;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Front\IcoSubmissionRequest;
use App\Http\Requests\Front\SocialSubmissionRequest;
use App\Http\Requests\Front\TeamSubmissionRequest;
use App\Http\Requests\Front\InformationRequest;
use App\Models\Front\Ico\IcoCategory;
use App\Models\Front\Ico\IcoSocialLinksType;
use App\Models\Front\Ico\IcoSocialLink;


class IcoController extends Controller
{
    
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
    protected function index(Request $request)
    {
        $data['ico'] = Icosubmission::teamMembers($id='',Auth::id());
        return view('front.startup.IcoList',$data);
    }
    
    /**
     * Create/Edit ICO Submission
     * @param Request $request
     * @return type
     */
    protected function CreateIco($id = "")
    {   
        $data['edit_ico'] = Icosubmission::find($id);
        if($data['edit_ico']){
            if($data['edit_ico']->ico_status != '0'){
                return Redirect(route('manage_ico'));
            }
        }
        $data['category'] = IcoCategory::getData();        
        if($id != ''){
            $data['edit_team'] = Icoteam::getAllDataByID($id);
        }
        return view('front.startup.AddIco',$data);
    }
    
   
    /**
     * Save/Update ICO Submission
     * @param Request $request
     * @return type
     */
    public function SaveIco(IcoSubmissionRequest $request)
    {   
       
        $id = isset($request['id']) ? $request['id'] : '';
        
        $data['user_id'] = Auth::id();
        //$data['ico_type'] = strip_tags($request['ico_type']);
        $data['category_id'] = strip_tags($request['category_id']);
        $data['name'] = strip_tags($request['name']);
        if(Auth::user()->register_type == "L"){
            $data['type'] = 'L';    
        }
        //$data['short_description'] = $request['short_description'];
        //$data['concept'] = $request['concept'];
        $data['start_time'] = date("Y-m-d H:i:s" ,strtotime(str_replace('/','-',$request['start_time'])));
        $data['end_time'] = date("Y-m-d H:i:s" ,strtotime(str_replace('/','-',$request['end_time'])));
        $data['soft_cap'] = strip_tags($request['soft_cap']);
        $data['hardcap'] = strip_tags($request['hardcap']);
        $data['restriction'] = strip_tags($request['restriction']);
        $data['accepts'] = strip_tags($request['accepts']);
        $data['token_price'] = strip_tags($request['token_price']);
        $data['whitelist'] = strip_tags($request['whitelist']);
        $data['kyc'] = strip_tags($request['kyc']);
        $data['technology'] = strip_tags($request['technology']);
        $data['origin_country'] = strip_tags($request['origin_country']);
        //$data['kyc_id'] = $request['kyc_id'];
        $data['symbol'] = strip_tags($request['symbol']);
             
        $ico_id = Icosubmission::storeData($data,(int)$id);
        
        $icoData['ico_id'] = $ico_id;
        
        if (empty($id)) {
           $request->session()->flash('alert-success', 'Record Created Successfully');
        } else {
            $request->session()->flash('alert-success', 'Record Updated Successfully');
        }
        
        return Redirect(url('startup/social-inform/'.$ico_id->id));
    }
    
    public function SearchData(Request $request) {
        $catID = Icosubmission::getIcoDataByID($request['search']);
        $data['icoData'] = $catID->toArray();
        return view('front/pages/search', $data);
    }
    
    public function viewIcoData(Request $request){
        $data['ico_data'] = Icosubmission::find($request['ico_id']);
        if(count($data['ico_data'])>0){
            $data['ico_team'] = Icoteam::getAllDataByID($data['ico_data']['id']);
        }
        
        return view('front/startup/viewico', $data);
    }
    
    public function viewInformation(Request $request){
        $data['ico_data'] = Icosubmission::find($request['ico_id']);
        return view('front/startup/viewico', $data);
    }
    
    public function updateSocialInformation(SocialSubmissionRequest $request){ //SocialSubmission
        
        $id = isset($request['id']) ? $request['id'] : '';
        
        if($id){
            $icoData['website'] = $request['website'];
            $icoData['blog'] = $request['blog'];
            $icoData['whitepaper'] = $request['whitepaper'];
            $icoData['facebook'] = '';
            $icoData['twitter'] = '';
            $icoData['linkedin'] = '';
            $icoData['slack_chat'] = '';
            $icoData['telegram_chat'] = '';
            $icoData['github'] = '';         
            $icoData['short_description'] = $request['short_description'];
            $icoData['concept'] = $request['concept'];
            $icoData['video'] = $request['video'];
            $bannerpath = 'ICO/BannerImage/';
            $logopath = 'ICO/LogoImage/';

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

            $icoData['banner_image'] = $banner_img;

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

            $icoData['logo_image'] = $logo_img;

            Icosubmission::storeData($icoData,(int)$id);
        }
        
        IcoSocialLink::deleteSocialLink($id);
        foreach($request['link_type'] as $key => $value){
            $data['ico_id'] = $id;
            $data['link_type'] = $value;
            $data['url'] = $request['url'][$key];
            $ico_id = IcoSocialLink::storeData($data,$link_id = '');
        }
        $icoData['ico_id'] = $ico_id->ico_id;
        $icoData['teamData'] = Icosubmission::teamMembers($id,Auth::id());
        
        if (empty($id)) {
           $request->session()->flash('alert-success', 'Social Information Created Successfully');
        } else {
            $request->session()->flash('alert-success', 'Social Information Updated Successfully');
        }
       
        return Redirect(url('startup/team-inform/'.$ico_id->ico_id));
        
    }
    
    public function updateTeamInformation(TeamSubmissionRequest $request){
        
        $id = isset($request['id']) ? $request['id'] : '';
        
        $res1 = array_filter($request['member_name'], function($value) {
            return $value !== '';
        });         
        Icoteam::deleteTeamMember($id);
        $teamData = [];
        $result = [];
        for ($i = 0; $i < count($res1); $i++) {
            if ($request['member_name'][$i] != '') {
                $teamData['ico_id'] = $id;
                $teamData['member_name'] = $request['member_name'][$i];
                $teamData['member_designation'] = $request['member_designation'][$i];
                $teamData['linkedin_url'] = $request['linkedin_url'][$i];
                $result = Icoteam::SaveIcoTeam($teamData);
            }
        }
        $ico_name = Icosubmission::find($id)->name;
        
        if($result){
            //Mail to User
            $mailData = [];
            $mailData['email'] = Auth::user()->email;
            $mailData['name'] = Auth::user()->name;
            $mailData['ico_name'] = ucwords($ico_name);
            $mailData['status'] = 'added';
            $arrData = $mailData;
            Mail::send('email/ico', $arrData, function($message) use ($mailData) {
                    $message->to($mailData['email'], $mailData['name'])
                     ->subject('ICO Submission on WeiZard');
            });
        }
        
        
        
        $request->session()->flash('alert-success', 'ICO added successfully.');
        return Redirect(route('manage_ico'));
        //return Redirect(url('startup/information/'.$id));
    }
    
    public function updateInformation(InformationRequest $request){
        
        $id = isset($request['id']) ? $request['id'] : '';
        $data['concept'] = $request['concept'];         
        $ico_id = Icosubmission::storeData($data,(int)$id);
        $request->session()->flash('alert-success', 'ICO Added Successfully.');
        return Redirect(route('manage_ico'));
        
    }
    
    public function getInformation($id){
        $ico_id = Icosubmission::getAllDataByID((int)$id);
        $icoData['ico_id'] = $ico_id[0];
        return view('front/pages/information', $icoData);
        
    }
    
    public function viewSocialData($id){
        $ico_detais = Icosubmission::getAllDataByID((int)$id);
        if($ico_detais[0]->ico_status != '0'){
            return Redirect(route('manage_ico'));
        }
        $ico_id = IcoSocialLink::getAllDataByIcoId((int)$id);
        $link_type = IcoSocialLinksType::getAllData();
         foreach($link_type as $value){
            $linkArr[$value->name] = $value->name;
         }
        $icoData['link_type'] = $linkArr;
        $icoData['ico_id'] = $ico_id;
        $icoData['ico_detais'] = $ico_detais[0];
        $icoData['id'] = $id;
        return view('front/pages/social-information', $icoData);
        
    }
    
    public function viewTeamData($id){
        $ico_id = Icosubmission::getAllDataByID((int)$id);
        if($ico_id[0]->ico_status != '0'){
            return Redirect(route('manage_ico'));
        }
        $icoData['teamData'] = Icosubmission::teamMembers($id,Auth::id());
        $icoData['ico_id'] = $ico_id[0];
        return view('front/pages/team-information', $icoData);
        
    }
    
    public static function getIcoList(Request $request ) {            
            if($request->type != ''){
                $date = date("Y");
                $type = '';
                $year = $request->type;
                if($year == $date){
                    $data['ico_status'] = 'Present';
                    $data['presentIcoData'] = Icosubmission::getIcoByYear($request->type, $request->id);
                }elseif($year >= $date){
                    $data['ico_status'] = 'Upcoming';
                    $data['upcomingIcoData'] = Icosubmission::getIcoByYear($request->type, $request->id);
                }elseif($year <= $date){
                    $data['ico_status'] = 'Past';
                    $data['pastIcoData'] = Icosubmission::getIcoByYear($request->type, $request->id);
                }else{
                    //$type = '';
                }
                $rt['html'] = view('front.pages.ajax-list', $data)->render();
            }else{
                $data['icoData'] = Icosubmission::getIcoByCategory($request->id);
                $data['upcomingIcoData'] = Icosubmission::getIcoByDatewise('Upcoming', $request->id);
                $data['pastIcoData'] = Icosubmission::getIcoByDatewise('Past', $request->id);
                $data['presentIcoData'] = Icosubmission::getIcoByDatewise('Present', $request->id); 
                $rt['html'] = view('front.pages.category-ajax-list', $data)->render();
            }
            $rt['status'] = 'true';
            return json_encode($rt);        
    }

//    public static function getDatewiseIcoList(Request $request ) {            
//            $data['icoData'] = Icosubmission::getIcoByDatewise($request->type);
//            $rt['status'] = 'true';
//            $rt['html'] = view('front.pages.ajax-list', $data)->render();
//            return json_encode($rt);        
//    }
   
    public static function getDatewiseIcoList(Request $request ) {
            //$data['icoData'] = Icosubmission::getIcoByYear($request->type, $request->id);
            $date = date("Y");
            $type = '';
            $year = $request->type;
            if($year == $date){
                $data['ico_status'] = 'Present';
                $data['presentIcoData'] = Icosubmission::getIcoByYear($request->type, $request->id);
            }elseif($year > $date){
                $data['ico_status'] = 'Upcoming';
                $data['upcomingIcoData'] = Icosubmission::getIcoByYear($request->type, $request->id);
            }elseif($year < $date){
                $data['ico_status'] = 'Past';
                $data['pastIcoData'] = Icosubmission::getIcoByYear($request->type, $request->id);
                //dd($data['pastIcoData']);
            }else{
                //$type = '';
            }
            $rt['status'] = 'true';
            $rt['html'] = view('front.pages.ajax-list', $data)->render();
            return json_encode($rt);        
    }

    public function getSingleList($name){
        $name = str_replace('-', ' ', $name);
        $icoData['icoData'] = Icosubmission::getAllDataByName($name);
        if($icoData['icoData']){
            return view('front.pages.single-ico-list', $icoData);
        }else{
            return Redirect(url('/'));
        }
        
        
    }
    
    public static function checkSymbol(Request $request) {             
        
        $symbolData = Icosubmission::getIcoBySymbol($request->symbol);
        if(count($symbolData)>0){
            $rt = false;
        }else{
            $rt = true;
        }
        return json_encode($rt);        
    }
    
    public static function getIcoName(Request $request ) {            
        
        $icoData = Icosubmission::getIcoByName($request->keyword);
        $result = '<ul id="country-list">';
        if(count($icoData)>0){
            foreach($icoData as $value){
               $result .= '<li><a href = "'.url('ico/'.str_replace(' ', '-', $value->name)).'"><img width="30" height="30" src= "'.url('/').'/ICO/LogoImage/'. $value->logo_image.'">' .$value->name.'</a></li>';
            }
        }else{
            $result .= '<li>No record found...</li>';
        }
        $result .='</ul>'; 
        $rt['html'] = $result;
        $rt['status'] = 'true';
        return json_encode($rt);        
    }
    

     
}
