<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orders;
use App\User;
class Payment extends Model
{
    //
    protected $fillable = ['currency','value','payer_id','payee_id','status'];
    protected $appends  = ['payment_link','payee_email','payee_name','orders','status_text'];

    public function orders(){
        return $this->hasMany(Orders::class,'payment_id','id');
    }

    public function payer(){
        return $this->belongsTo(User::class,'payer_id','id');
    }

    public function payee(){
        return $this->belongsTo(User::class,'payee_id','id');
    }

    public function getPayerIdAttribute($value){
        return (User::find($value))->email;
    }

    public function getPayeeNameAttribute(){
        return $this->payee->firstname.' '.$this->payee->lastname;
    }

    public function getPaymentLinkAttribute($value){
        return url('pay/me',$this->id);
    }

    public function getOrdersAttribute($value){
        return $this->orders()->get();
    }

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

    public function getPayeeEmailAttribute(){
        return User::find($this->payee_id)->email;
    }

    
}
