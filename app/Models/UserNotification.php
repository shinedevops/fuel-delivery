<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'caccept_orde',
        'subscription',
        'new_order',
        'issue',
        
    ];

    public function userProfile(){
    return $this->belongsTo(User::class);
    }
}
