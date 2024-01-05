<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_website',
        'complete_address',
        'phone_number',
        'company_size',
        'driving_licence',
        'date',
        'invitation_status',
    ];


    public function userProfile(){
    return $this->belongsTo(User::class);
    }

   
}
