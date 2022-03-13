<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $fillable = ['payment_id','title','description','quantity'];

    
}
