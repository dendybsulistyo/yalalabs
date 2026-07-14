<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'institution_name',
        'email',
        'phone',
        'product_interest',
        'message',
        'status',
        'ip_address',
        'user_agent',
    ];
}
