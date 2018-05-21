<?php

namespace App\Models\Front\Ico;

Use DB;
use Illuminate\Database\Eloquent\Model;

class IcoSocialLinksType extends Model {

    protected $table = 'ico_social_links_type';

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
   
    public static function getAllData()
    {
        $varData = self::orderBy('id', 'asc')->get();
        return ($varData ? : []);
    }

    public static function getData()
    {
        $varData = self::orderBy('id', 'asc')->pluck('name','id')->toArray();
        return ($varData ? : []);
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

    public static function teamMembers($id,$userID)
     {
         if($id != ''){
             $data = self::where('id', $id)->where('user_id', $userID)->with('icoTeamRel')->get();
         }else{
             $data = self::where('user_id', $userID)->with(['icoTeamRel'])->get();
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
    public static function getIcoDataByStatus($status)
    {
        $users = DB::table('ico_submission');
        $users->select('ico_submission.*');
        $users->where('ico_submission.ico_status', $status);
        $users->orderBy('ico_submission.id', 'desc');
        $arrUser = $users->paginate(10);
        return ($arrUser ?: []);
        
    }
     
    public static function updateIcoStatus($statusArr, $id) {
        self::where('id', $id)->update($statusArr);
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
}
