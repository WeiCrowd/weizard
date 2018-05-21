<?php

namespace App\Http\Controllers\Admin\SiteSetting;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\SiteSetting\SiteSetting;
use App\Models\Master\Country;

class SiteSettingController extends Controller {

    protected $sitesettings;
    protected $country;

    /**
     * __construct
     * @param
     * @return
     * @since 0.1
     * @author Meghendra S Yadav
     */
    public function __construct() {
        $this->middleware('auth');
        $this->sitesettings = new SiteSetting();
        $this->country = new Country();
    }

    /**
     * index
     * @param
     * @return
     * @since 0.1
     * @author Minee Soni
     */
    public function index() {
        $arrSettingData = $this->sitesettings->getAllSettings();
        $arrData = [];
        foreach ($arrSettingData as $settingdata) {
            $arrData[$settingdata->option_name] = $settingdata->option_value;
        }
        $arrCountry = $this->country->getAllCountry();
        return view('admin.sitesetting.sitesettings')
                        ->with('arrSettingData', $arrData)
                        ->with('arrCountry', $arrCountry);
    }

    /**
     * saveSettings
     * @param
     * @return
     * @since 0.1
     * @author Minee Soni
     */
    public function saveSettings(Request $request) {

        $validation = Validator::make($request::all(), [
                    'admin_email' => 'email',
                    'from_email' => 'email',
        ]);
        if ($validation->fails()) {
            $response = [];
            $response['error_msg'] = $validation->errors()->toArray();
            return redirect()->back()->with('err_response', [$response]);
        } else {
            $arrSettingData = [];

            /* General Settings */
            $arrSettingData["site_offline"] = Request::get("site_offline");
            $arrSettingData["site_offline_message"] = Request::get("site_offline_message");
            //$arrSettingData["site_active_ip"] = Request::get("site_active_ip");
            $arrSettingData["country"] = implode(', ', Request::get("country"));

            /* Site Settings */
            $arrSettingData["admin_email"] = Request::get("admin_email");
            $arrSettingData["admin_otp_mobile"] = Request::get("admin_otp_mobile");
            $arrSettingData["from_email"] = Request::get("from_email");
            $arrSettingData["from_name"] = Request::get("from_name");
            $arrSettingData["toll_free_number"] = Request::get("toll_free_number");
            $arrSettingData["copyright_content"] = Request::get("copyright_content");
            //$arrSettingData["site_logo"] = Request::get("site_logo");

            /* Social Settings */
            $arrSettingData["facebook_link"] = Request::get("facebook_link");
            $arrSettingData["twitter_link"] = Request::get("twitter_link");
            $arrSettingData["linkedin_link"] = Request::get("linkedin_link");

            /* sms settings  */
            $arrSettingData["sms_key"] = Request::get("sms_key");
            $arrSettingData["sms_sender_id"] = Request::get("sms_sender_id");
            $arrSettingData["sms_url"] = Request::get("sms_url");
            $arrSettingData["sms_timeout"] = Request::get("sms_timeout");

            /* Upload site logo */
            if (Request::file('site_logo')) {
                $varFile = Request::file('site_logo');
                $varFileName = $varFile->getClientOriginalName();
                $varFileEncName = str_replace(' ', '_', $varFileName);
                $destinationPath = "assets/site_logo";
                Request::file('site_logo')->move($destinationPath, $varFileEncName);
                $this->sitesettings->updateSettings('site_logo', $varFileEncName);
            }
            
            /* Upload site favicon */
            if (Request::file('site_favicon')) {
                $varFile = Request::file('site_favicon');
                $varFileName = $varFile->getClientOriginalName();
                $varFileEncName = str_replace(' ', '_', $varFileName);
                $destinationPath = "assets/site_favicon";
                Request::file('site_favicon')->move($destinationPath, $varFileEncName);
                $this->sitesettings->updateSettings('site_favicon', $varFileEncName);
            }

            foreach ($arrSettingData as $k => $setting) {
                $this->sitesettings->updateSettings($k, $setting);
            }

            $message = "Site Settings Saved Successfully";
            return redirect(route('admin_site_setting'))->with('message', $message);
        }
    }

}
