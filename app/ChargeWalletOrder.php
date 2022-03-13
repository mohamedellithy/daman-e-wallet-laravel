<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargeWalletOrder extends Model
{
    //
    protected $fillable = ['value','notice','status'];

    protected $appends  = ['status_text'];

    public function getCreatedAtAttribute($value){
        return date('Y-m-d',strtotime($value));
    }

    public function getStatusTextAttribute(){
        $status = 'pending';
        if($this->status == 1):
            $status = 'completed';
        elseif($this->status ==2):
            $status = 'canceled';
        endif;

        return $status;
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
