<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Payment;
class TicketSupport extends Model
{
    //
    protected $fillable = ['title','ticket','user_id','payment_id','ticket_id','email','type','status'];

    protected $appends = ['status_text'];

    public function users(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function payments(){
        return $this->hasOne(Payment::class,'id','payment_id');
    }

    public function getPaymentsInfoAttribute(){
        // payments_info
        return $this->payments();
    }

    public function getStatusTextAttribute(){
        $status = 'open';
        if($this->status == 0):
            $status = 'open';
        elseif($this->status ==1):
            $status = 'closed';
        endif;

        return $status;
    }

    public function getCreatedAtAttribute($value){
        return date('Y-m-d h:i:s',strtotime($value));
    }

    public function getImageAttribute(){
        return $this->type == 0 ? 'https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png' : 'https://moutamadris.info/admin/avatar/avatar17.png';
    }
}
