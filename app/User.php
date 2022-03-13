<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Payment;
use App\Withdraw;
use App\TicketSupport;
use App\ChargeWalletOrder;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','username','country','phone', 'email', 'password','role'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function payer(){
        return $this->hasMany(Payment::class,'payer_id','id');
    }

    public function payee(){
        return $this->hasMany(Payment::class,'payee_id','id');
    }

    public function withdraw_orders(){
        return $this->hasMany(Withdraw::class,'user_id','id');
    }

    public function charge_wallet_orders(){
        return $this->hasMany(ChargeWalletOrder::class,'user_id','id');
    }

    public function ticket_support(){
         return $this->hasMany(TicketSupport::class,'user_id','id');
    }

    public function isAdmin(){
        return auth()->user()->role == 1;
    }

    public function getWithdrawsValueAttribute(){
        return auth()->user()->withdraw_orders()->where('status',1)->sum('value');
    }

    public function getChargeValueAttribute(){
        return auth()->user()->charge_wallet_orders()->where('status',1)->sum('value');
    }

    public function getWalletValueAttribute(){
        return $this->getChargeValueAttribute() - $this->getWithdrawsValueAttribute();
    }

    public function getPaymentsCountAttribute(){
        return auth()->user()->payee()->count() + auth()->user()->payer()->count();
    }
}
