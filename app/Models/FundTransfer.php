<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\FundTransfer;
use App\Models\userAccountDetail;



class FundTransfer extends Model
{
    use HasFactory;
	protected $table ='fund_transfer';
	protected $fillable = [
							'id',
							'trf_frm_accountnumber',
							'trf_to_accountnumber',
							'trf_amount',
							'trf_currency_code',
							'trf_frm_currency_code',
							'trf_to_currency_code',
							'trf_status',
							'trf_date',
							];
							
	public function userDetails()
    {
        return $this->belongsTo(userAccountDetail::class, ['trf_frm_accountnumber','trf_to_accountnumber'],'account_number');
    }
}
