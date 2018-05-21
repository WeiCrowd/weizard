<?php

namespace App\Models\Front\Kyc;

Use DB;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model {

    protected $table = 'tbl_kyc';

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
     * storeData
     * @param 
     * @return array
     * @since 0.1
     * @author Vikrant
     */
    public static function storeData($id = '', $input)
    {
        try {
            $data = self::updateOrCreate(['id' => (int) $id], $input);    
            return ($data ? : false);
            
        } catch (\Exception $e) {
            $data['errors'] = $e->getMessage();
        }        
    }
    
    public static function getKycByUserId($user_id)
    {
        $data = self::where(['user_id' => $user_id])->with(['countryRel'])->first();
        return $data;
    }
    
    public function countryRel()
    {
        return $this->belongsTo(\App\Models\Admin\Master\Country::class, 'country_id');
    }
    
    public static function getKycDataByUserId($user_id)
    {
        $users = DB::table('users');
        $users->leftjoin('tbl_kyc', 'users.id', '=', 'tbl_kyc.user_id');
        $users->leftjoin('investor', 'investor.id', '=', 'users.type_id');
        $users->leftjoin('etheruem_address', 'users.id', '=', 'etheruem_address.user_id');
        $users->leftjoin('mst_country', 'mst_country.id', '=', 'investor.citizenship');
        $users->select('users.id as uid','tbl_kyc.*','users.name','users.email','investor.citizenship','investor.gender','investor.address1','investor.address2','investor.city','investor.postal_code','users.mobile','etheruem_address.ethereum_address','mst_country.name as country_name');
        $users->orderBy('users.id', 'desc');
        $users->where('users.id', $user_id);
        $arrUser = $users->first();  
        return ($arrUser ?: []);
    }
    
}
