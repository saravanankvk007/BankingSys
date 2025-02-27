<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FundTransfer;


class userAccountDetail extends Model
{
    use HasFactory;
	
	protected $table ='users_accountdetails';
	protected $fillable = [
							'id',
							'user_id',
							'account_number',
							'first_name',
							'last_name',
							'dob',
							'address',
							'open_balance',
							'currency_code',
							'final_balance',
							'account_active_status',
							'role',
							];
	/* 
	public function fundTransfers()
    {
        return $this->hasMany(FundTransfer::class, ['trf_frm_accountnumber','trf_to_accountnumber'], 'account_number');
    }
	
	 */
	public function sentTransfers()
    {
        return $this->hasMany(FundTransfer::class, 'trf_frm_accountnumber', 'account_number');
    }

    // Fund transfers where the user is the receiver
    public function receivedTransfers()
    {
        return $this->hasMany(FundTransfer::class, 'trf_to_accountnumber', 'account_number');
    }

    // Merging both sent and received transfers
    public function allTransfers()
    {
        return $this->sentTransfers->merge($this->receivedTransfers);
    }
	
}
