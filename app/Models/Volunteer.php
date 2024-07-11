<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'user_email',
        'volunteering_type',
        'phone_number',
        'verifying_token',
        'skills',
        'availability',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}