<?php

namespace App\Models\Front\Ico;

Use DB;
use Illuminate\Database\Eloquent\Model;

class Icosubmission extends Model {

    protected $table = 'ico_submission';

    /**
     * Custom primary key is set for the table
     * 
     * @var integer
     */
    protected $primaryKey = 'id';

    /**
     * Maintain created_at and updated_at automatically
     * 
     * @var boolean
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [];
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
     /**
     * SaveIcoSubmission
     * @param 
     * @return array
     * @since 0.1
     * @author Minee Soni
     */
    public static function storeData($input,$id)
    {
        
        try {
           $data = self::updateOrCreate(['id' => (int) $id], $input);
        } catch (\Exception $e) {
            $data['errors'] = $e->getMessage();
        }
        return $data;
    }
    
   
    public static function getAllData($input)
    {
        $varData = self::create($input);
        return ($varData->id ? : []);
    }
    
    /**
     * getIcoSubmissionData
     * @param $id
     * @return array
     * @since 0.1
     * @author Minee Soni
     */
    public static function getAllDataByID($id)
    {
         $data = self::where('id',$id)
                      ->get();

        return ($data ?: []);
    }
    
    public function icoTeamRel()
    {
        return $this->hasMany(\App\Models\Front\Ico\Icoteam::class, 'ico_id');
    }
    
    public static function teamMembers($id,$userID)
     {
         if($id != ''){
             $data = self::where('id', $id)->where('user_id', $userID)->with('icoTeamRel')->get();
         }else{
             $data = self::where('user_id', $userID)->with(['icoTeamRel'])->orderBy('ico_submission.id','desc')->get();
         }

         return $data;
     }
    
    

    /**
     * Get All Ico
     * @param var $status
     * @return array $ico
     * @since 0.1
     * @author Minee Soni
     */

    public static function getAdminIcoDataByStatus($status)
    {
        $users = DB::table('ico_submission');
        $users->select('ico_submission.*', 'users.customer_id as weis_id', 'users.email');
        $users ->join('users', 'users.id', '=', 'ico_submission.user_id');
        $users->where('ico_submission.ico_status', $status);
        $users->where('ico_submission.type' , 'L');
        $users->orderBy('ico_submission.id', 'desc');
        $arrUser = $users->paginate(50);
        return ($arrUser ?: []);
        
    }
    
    public function userRel()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
    
     
    public static function allIcoFilter($request, $status)
    {
        $users = DB::table('ico_submission');
        $users ->join('users', 'users.id', '=', 'ico_submission.user_id');
        if($status !=''){
            $users->where('ico_submission.ico_status', $status);
        }
        $users->where('ico_submission.type' , 'L');
        $users->orderBy('ico_submission.id', 'desc');
    
        if ($request['download'] != "") {
            $users->select('users.customer_id as weis_id','users.email','ico_submission.name','ico_submission.start_time','ico_submission.end_time','ico_submission.ico_status');
        } else {
            $users->select('ico_submission.*', 'users.customer_id as weis_id', 'users.email');        
        }
    
        if (isset($request['name'])) {
            if ($request['name'] != "") {
                $name = trim($request['name']);
                $users->where('ico_submission.name', 'LIKE', "%$name%");            
            }
        }
        
       if (isset($request['customer_id'])) {
           if ($request['customer_id'] != "") {
                $customer_id = trim($request['customer_id']);
                $users->where('users.customer_id', '=', $customer_id);
           }
        }

        if (isset($request['download'])) {
            if ($request['download'] != "") {
                $usersArr = $users->get();
            }
        } else {
                $usersArr = $users->paginate(50);           
        }

        return ($usersArr ?: []);
    }

    public static function getIcoDataByStatus($status)
    {
        $users = DB::table('ico_submission');
        $users->select('ico_submission.*');
        $users->where('ico_submission.ico_status', $status);
        $users->where('ico_submission.type' , 'C');
        $users->orderBy('ico_submission.id', 'desc');
        $arrUser = $users->paginate(50);
        return ($arrUser ?: []);
        
    }
     
    public static function updateIcoStatus($statusArr, $id) {
        $data = self::where('id', $id)->update($statusArr);
        return $data;
    }
 
    /**
     * Get ICO Data By Title Name
     */
    public static function getIcoDataByID($title){
        $data = self::where('name', 'LIKE', "%$title%")
                      ->where('ico_status', '1')
                      ->select('id','name','start_time','end_time')
                      ->get();

        return ($data ?: []);
    }

    public static function getIcoByDatewise($type, $category_id = '')
    {
        $date = date("Y-m-d H:i:s");
        if($type == "Upcoming"){
            if($category_id != ''){
                $data = self::with('IcoRel')->where('category_id' , $category_id)->where('ico_status' , '1')->where('type' , 'L')->whereDate('start_time', '>', $date)
                      ->paginate(10,['*'], 'upcoming')->setPageName('upcoming');
            }else{
                $data = self::with('IcoRel')->where('ico_status' , '1')->where('type' , 'L')->whereDate('start_time', '>', $date)
                      ->paginate(10,['*'], 'upcoming')->setPageName('upcoming');
            }
        }elseif($type == "Past"){
            if($category_id != ''){
                $data = self::with('IcoRel')->where('category_id' , $category_id)->where('ico_status' , '1')->where('type' , 'L')->whereDate('start_time', '<', $date)
                        ->whereDate('end_time', '<', $date)
                        ->paginate(10,['*'], 'past')->setPageName('past');
            }else{
                $data = self::with('IcoRel')->where('ico_status' , '1')->where('type' , 'L')->whereDate('start_time', '<', $date)
                        ->whereDate('end_time', '<', $date)
                        ->paginate(10,['*'], 'past')->setPageName('past');
            }
        }elseif($type == "Present"){
            if($category_id != ''){
                $data = self::with('IcoRel')->where('category_id' , $category_id)->where('ico_status' , '1')->where('type' , 'L')->whereDate('start_time', '<=', $date)
                        ->whereDate('end_time', '>=', $date)
                        ->paginate(10,['*'], 'present')->setPageName('present');
            }else{
                $data = self::with('IcoRel')->where('ico_status' , '1')->where('type' , 'L')->whereDate('start_time', '<=', $date)
                        ->whereDate('end_time', '>=', $date)
                        ->paginate(10,['*'], 'present')->setPageName('present');
            }
        }else{
            $data = self::with('IcoRel')->where('ico_status' , '1')->where('type' , 'L')
                      ->paginate(10);

        }        
        return ($data ?: []);
    }
    
    public static function getIcoByYear($year, $category_id = '')
    {
        
        $date = date("Y");
        $type = '';
        if($year == $date){
            $type = "Present";
        }elseif($year > $date){
            $type = "Upcoming";
        }elseif($year < $date){
            $type = "Past";
        }else{
            $type = '';
        }
        
        if($type == "Upcoming"){
            if($category_id != ''){
                $data = self::with('IcoRel')->where('category_id' , $category_id)->where('ico_status' , '1')->where('type' , 'L')->whereYear('start_time', $year)
                      ->paginate(1);
            }else{
                $data = self::with('IcoRel')->where('ico_status' , '1')->where('type' , 'L')->whereYear('start_time', $year)
                      ->paginate(1);
            }
        }elseif($type == "Past"){
            if($category_id != ''){
                $data = self::with('IcoRel')->where('category_id' , $category_id)->where('ico_status' , '1')->where('type' , 'L')->whereYear('start_time', $year)
                        ->whereYear('end_time', $year)
                        ->paginate(1);
            }else{
                $data = self::with('IcoRel')->where('ico_status' , '1')->where('type' , 'L')->whereYear('start_time', $year)
                        ->whereYear('end_time', $year)
                        ->paginate(1);
            }
        }elseif($type == "Present"){
            if($category_id != ''){
                $data = self::with('IcoRel')->where('category_id' , $category_id)->where('ico_status' , '1')->where('type' , 'L')->whereYear('start_time', '=', $year)
                        ->whereYear('end_time', '=', $year)
                        ->paginate(1);
            }else{
                $data = self::with('IcoRel')->where('ico_status' , '1')->where('type' , 'L')->whereYear('start_time', '=', $year)
                        ->whereYear('end_time', '=', $year)
                        ->paginate(1);
            }
        }else{
            $data = self::with('IcoRel')->where('ico_status' , '1')->where('type' , 'L')
                      ->paginate(1);

        }        
        return ($data ?: []);
    }

    public static function getIcoByCategory($id)
    {
        if($id){
         $data = self::with('IcoRel')->where('category_id',$id)->where('ico_status' , '1')->where('type' , 'L')
                      ->get();
        }else{
            $data = self::with('IcoRel')->where('ico_status' , '1')->where('type' , 'L')->get();
        }

        return ($data ?: []);
    }
    
    public function IcoRel()
    {
        return $this->belongsTo(\App\Models\Front\Ico\IcoCategory::class, 'category_id');
    }
    
    /**
     * Get ICO Data By Title Name
     */
    public static function getIcoBySymbol($symbol){
        $data = self::where('symbol', $symbol)
                      ->where('ico_status', '1')
                      ->where('type', 'L')
                      ->get();

        return ($data ?: []);
    }
    
    public static function getAllDataByName($name)
    {
         $data = self::with(['icoTeamRel','IcoRel','socialRel'])->where('name',$name)->where('ico_status','1')->where('type','L')
                      ->first();

        return ($data ?: []);
    }
    
    public function socialRel()
    {
        return $this->hasMany(\App\Models\Front\Ico\IcoSocialLink::class, 'ico_id');
    }
    
    public static function getIcoByName($name)
    {
         $data = self::where('name', 'like', '%'. $name .'%')
                        ->where('ico_status','1')
                        ->where('type','L')
                      ->get();
        return ($data ?: []);
    }
    
    
}
