<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    //
	protected $primaryKey = 'memberNo';

	protected $table = 'members';

    protected $fillable = [
        'memberNo', 'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   /* public function setPasswordAttribute($password)
{
    $this->attributes['password'] = bcrypt($password);
}*/
	public function getAuthPassword() {
	    return $this->password;
	}
	
	public function getAuthIdentifier()
    {
    	return $this->memberNo;
    }    
    
    public function getMemberNoAttribute(){
     	return $this->attributes['memberNo'];
    }
}
