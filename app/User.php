<?php

namespace App;

use DB;
use App\Models\Admin\AccessManagement\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MailResetPasswordToken;

//use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    //use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'google2fa_secret','password', 'remember_token',
    ];

    public function isAdmin()
    {
        if ($this->user_type == "A") {
            return true;
        } else {
            return false;
        }
    }


    public function isOther()
    {
        if ($this->user_type == "O") {
            return true;
        } else {
            return false;
        }
    }

    public function isIco()
    {
        if ($this->user_type == "S") {
            return true;
        } else {
            return false;
        }
    }
    
    public function isInvestor()
    {
        if ($this->user_type == "I") {
            return true;
        } else {
            return false;
        }
    }

    
    public static function allData()
   {
        $user = self::orderBy('users.id', 'desc')
            ->select('users.*','tbl_roles.display_name as role')
            ->leftjoin('role_user', 'users.id', '=', 'role_user.user_id')
            ->leftjoin('tbl_roles', 'tbl_roles.id', '=', 'role_user.role_id')
            ->where('users.user_type', 'O')
            ->paginate(10);
        return $user;
    }
    
    
    public static function getUserRoleById($id){

        $UserRole = DB::table('users')
            ->leftjoin('role_user', 'users.id', '=', 'role_user.user_id')
            ->select('role_user.role_id')
            ->where('users.id', $id)
            ->get();

        return $UserRole;

    }
    
    public static function updateData($request, $id)
    {
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = strtolower($request['email']);
        $user->mobile = $request['mobile'];
        $user->user_type = 'O';
        $user->save();
    }
    
    public static function deleteData($id)
    {
        /* check assigned role */
        $varCheck = DB::table('role_user')
                ->where('user_id', $id)
                ->count();
        if ($varCheck == 0) {
            $user = self::where('id', $id)->delete();
        } else {
            $user = self::where('id', $id)->delete();
            DB::table('role_user')->where('user_id', $id)->delete();
        }
        return ($user ? $user : false);
        
    }
    
    /**
     * Determine if the user has the given role.
     *
     * @param  mixed $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
        return !!$role->intersect($this->roles)->count();
    }
    
    public function roles() {
        
        return $this->belongsToMany(Role::class);
    }
    
    
     /**
     * Assign the given role to the user.
     *
     * @param  string $role
     * @return mixed
     */
    public function assignRole($role_id)
    {
        return $this->roles()->sync(array($role_id));
    }
    
    /**
     * UpdateProfileData
     * @param 
     * @return array
     * @since 0.1
     * @author Minee Soni
     */
    public static function updateProfile($input,$id)
    {
        try {
           $data = self::where('id', (int) $id)->update($input);
        } catch (\Exception $e) {
            $data['errors'] = $e->getMessage();
        }
        return $data;
    }
    
     /**
     * getUserDetailsByID
     * @param $userID
     * @param type $userID
     * @author Minee Soni
     */
    public static function getUserDetailsByID($userID)
    {
        $arrUser = self::select('users.*')
            ->where('users.id', '=', $userID)
            ->first();
        return ($arrUser ? $arrUser : []);
    }
    
    /**
     * getUserByemail
     * @param $email
     * @return array $arrUser
     * @since 0.1
     * @author Minee Soni
     */
    public static function getUserByemail($email)
    {
        $arrUser = SELF::select('*')
            ->where('email', '=', $email)
            ->first();
        return ($arrUser ? $arrUser : []);
    }
    
    /**
     * Get Max Customer ID
     * @param 
     * @return array
     * @since 0.1
     * @author Minee Soni
     */
    public static function getCustomerCount()
    {
        try {
           // $data = self::where('user_type', 'I')->count();   
           $data = self::select('*')->count();
            return ($data ? : false);
            
        } catch (\Exception $e) {
            $data['errors'] = $e->getMessage();
        }        
    }
     
    public static function updateUser($user_id, $arrUserData) {
        $rowUpdate = self::find((int) $user_id)->update($arrUserData);
        return ($rowUpdate ? $rowUpdate : false );
    }
    
    
    /**
        * Send a password reset email to the user
    */
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }
    
}
