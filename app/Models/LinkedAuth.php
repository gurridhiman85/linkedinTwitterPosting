<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkedAuth extends Model
{
    use HasFactory;

    protected $table = 'linked_auths';

    protected $fillable = [
        'linkedin_id',
        'linkedin_token',
        'name',
        'email',
        'avatar',
        'headline',
        'location',
    ];

}
