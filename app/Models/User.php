<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\userAccountDetail;
use App\Models\FundTransfer;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
		'role',
		'google2fa_secret',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
	
	public function getRoleAttribute($value)
	{
		return ["admin", "user"][$value];
	}
	
	public function UserDetails()
	{
		return $this->hasOne(userAccountDetail::class, 'user_id');
	}
	
	public function SingleUserDetails()
	{
		return $this->hasOne(userAccountDetail::class, 'user_id');
	}
	
	
	public function fundTransfers()
    {
        return $this->hasManyThrough(
            FundTransfer::class,   
            userAccountDetail::class,   
            'user_id',             
            //'trf_frm_accountnumber', 
            'trf_to_accountnumber', 
            'id',                  
            'account_number'           // Local key on userdetails
        );
    }
	
	protected function google2faSecret(): Attribute

    {

        return new Attribute(

            get: fn ($value) =>  decrypt($value),

            set: fn ($value) =>  encrypt($value),

        );

    }

}
