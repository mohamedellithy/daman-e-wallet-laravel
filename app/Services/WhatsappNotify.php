<?php
namespace App\Services;
class WhatsappNotify{
    protected $token = null;
    protected $user  = null;
    private function __construct($user,$token = null){
       $this->token = $token;
       $this->user  = $user;
    }
}
